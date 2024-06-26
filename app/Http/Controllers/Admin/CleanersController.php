<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CleanersController extends Controller
{
    private $user;
    private $reservation;

    public function __construct(User $user, Reservation $reservation)
    {
        $this->user = $user;
        $this->reservation = $reservation;
    }

    public function showCleanersPage()
    {
        return view('admins.cleaners.cleaners_page');
    }

    public function showCleaningProgressPage()
    {
        $all_reservations = $this->reservation->all();
        $cleaners = $this->user->where('role_id',User::CLEANER_ROLE_ID)->get();
        return view('admins.cleaners.cleaning_progress_page')
                ->with('all_reservations',$all_reservations)
                ->with('cleaners',$cleaners);
    }

    public function chooseCleaner(Request $request,$id)
    {
        $request->validate([
            "cleaner_id" => "required"
        ]);

        $reservation = $this->reservation->findOrFail($id);

        $postData = [
            'user_id' => $request->cleaner_id,
            'reservation_id' => $reservation->id,
        ];

        $reservation->cleaning()->create($postData);

        $all_reservations = $this->reservation->all();
        $cleaners = $this->user->where('role_id',User::CLEANER_ROLE_ID)->get();
        return view('admins.cleaners.cleaning_progress_page')
                ->with('all_reservations',$all_reservations)
                ->with('cleaners',$cleaners);
    }

    public function changeCleaner(Request $request,$id)
    {
        $request->validate([
            "cleaner_id" => "required"
        ]);

        $reservation = $this->reservation->findOrFail($id);

        $postData = [
            'user_id' => $request->cleaner_id,
        ];

        $reservation->cleaning()->update($postData);

        $all_reservations = $this->reservation->all();
        $cleaners = $this->user->where('role_id',User::CLEANER_ROLE_ID)->get();
        return view('admins.cleaners.cleaning_progress_page')
                ->with('all_reservations',$all_reservations)
                ->with('cleaners',$cleaners);
    }

    public function showCheckCleaningProgressReport($id)
    {
        $reservation = $this->reservation->findOrFail($id);
        $nearest_reservation_date = $reservation
                                   ->where('id', '!=', $reservation->id)
                                   ->where('room_id', $reservation->room_id)
                                   ->oldest('created_at')
                                   ->first();
        $reservation_task = $reservation->reservationTask()->get();
        
        return view('admins.cleaners.check_cleaning_progress_report')
                    ->with('reservation',$reservation)
                    ->with('nearest_reservation_date', $nearest_reservation_date)
                    ->with('reservation_task', $reservation_task);

    }

    public function CleanerManagementPage()
    {
        $cleaners = User::where('role_id', User::CLEANER_ROLE_ID)->with('profile')->get();

        return view('admins.cleaners.cleaners_management', ['cleaners' => $cleaners]);
    }

    public function showModalDelete()
    {
        return view('admins.cleaners.modal.cleaner_delete_modal');
    }

    public function showCreateCleanerPage()
    {
        return view('admins.cleaners.create_cleaner');
    }

    public function destroy($id)
    {
        $cleaner = User::findOrFail($id);
        $cleaner->delete();

        return redirect()->route('admin.cleaners.CleanerManagementPage')->with('success', 'Cleaner deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => 'required|string|max:255|unique:users', // 画像では varchar(255) かつ ユーザーテーブル内で一意
            'email' => 'required|string|email|max:100|unique:users', // 画像では varchar(100) かつ ユーザーテーブル内で一意
            'password' => 'required|string|min:6', // パスワードについては画像からは情報が得られないが、一般的に最小6文字が望ましい
            'phone_number' => 'required|string|max:20', // 画像では varchar(20)
            'address' => 'required|string|max:100', // 画像では varchar(100)
        ]);

        DB::beginTransaction();
        try {
            $user = new User; // 新しいインスタンスを作成
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = User::CLEANER_ROLE_ID;
            $user->save();

            $profile = new Profile; // 新しいProfileインスタンスを作成
            $profile->first_name = ucfirst($request->first_name);
            $profile->last_name = ucfirst($request->last_name);
            $profile->phone_number = $request->phone_number;
            $profile->address = $request->address;
            $user->profile()->save($profile); // ユーザーにプロファイルを関連付けて保存

            \DB::commit(); // トランザクションをコミット

            return redirect()->route('admin.cleaners.CleanerManagementPage')->with('success', 'Cleaner Account created successfully');
        } catch (\Exception $e) {
            \DB::rollback(); // エラーがあればロールバック
            
            // エラーログを出力する
            \Log::error('An error occurred: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
            
            // ユーザーにエラーメッセージを表示して元のページに戻す
            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $cleaner = User::findOrFail($id);
        return view('admins.cleaners.edit_cleaner', compact('cleaner'));
    }

    public function update(Request $request, $id)
    {
        $cleaner = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => 'required|string|max:255|unique:users,username,' . $id, // usernameは一意である必要がありますが、自分自身を除外
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:100',
        ]);

        // データの更新（メールとパスワードは更新しない）
        $cleaner->username = $request->username;
        $cleaner->save();

        $profile = $cleaner->profile;
        $profile->first_name = ucfirst($request->first_name);
        $profile->last_name = ucfirst($request->last_name);
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;
        $profile->save();

        return redirect()->route('admin.cleaners.CleanerManagementPage')->with('success', 'Cleaner updated successfully');
    }

}