<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make()->each(function($user){
                $user->avatar='http://memorybbs.test/uploads/images/avatars/201812/12/1_1544622913_8yKywDRZ0KYoiGMXpng';
            });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        $user=User::find(1);
        $user->email="387982650@qq.com";
        $user->save();
    }
}
