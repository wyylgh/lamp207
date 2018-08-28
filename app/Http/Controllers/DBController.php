<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class DBController extends Controller
{
    /**
     * 模型
     */
    public function model()
    {
        // $user = new User;
        // //设置成员属性
        // $user -> name = 'admin';
        // $user -> password = 'admin';
        // $user -> email = 'abc@qq.com';
        // //添加记录
        // $user -> save();

        //获取对象
        // $user = User::find(1);

        //更新
        // $user -> name = '123456789';
        // $user -> save();

        //删除
        // $user -> delete();

        $user = User::find(1);

        //一对一关系
        //获取详细信息
        //获取用户名
        // $name = $user->name;
        //获取性别
        // $sex  = $user->userinfo->name;
        // $info = $user->userinfo;
        // dd($sex);

        //一对多关系
        // $news = $user->news;

        //属于关系
        // $group = $user->group->name;

        //多对多关系  用户和课程的关系

        dd($group);
    }

    /**
     * 查询
     */
    public function select()
    {
    	$mvs = DB::select('select * from mvs limit 10');
    }

    /**
     * 事务
     */
    public function trans()
    {
    	test();
    	DB::transaction(function(){
    		//
	    	$res1 = DB::update('update users set account = account - 100 where id = 100');
	    	$res2 = DB::update('update users set account = account + 100 where id = 6');

	    	if($res1 && $res2) {
	    		DB::commit();
	    	}else{
	    		DB::rollback();
	    	}

    		// try{
	    	// 	$res2 = DB::update('update users sets account = account + 100 where id = 6');
	    	// }catch(\Exception $e) {
	    	// 	//获取异常的信息
	    	// 	echo $e->getMessage();
	    	// }

	    	// echo 3333;

    	});
    	return view('page1');
    }
    /**
     * join
     */
    public function join()
    {
        $res = DB::table('goods')
            ->join('cates','goods.cate_id','=','cates.id')
            ->skip(0)
            ->take(10)
            ->get();

        dd($res);
    }

    
}
