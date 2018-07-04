<?php

namespace App\Http\Controllers\admin;
use Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\User;
use App\Models\Cate;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Goods::get()->toArray();

        // dd($date);
        $arr=[];
        $arr['num']=10;
        $arr['search']='';
        return view('admin.goods.index',['title'=>'单品列表','arr'=>$arr,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = Cate::get();
        //生成商品no
        $goods_no = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        return view('admin.goods.add',['title'=>'商品添加','goods_no'=>$goods_no,'arr'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // //表单验证
        //     $this->validate($request, [
        //         'username' => 'required|regex:/^\w{6,12}$/',
        //     ],[
        //         'username.required'=>'用户名不能为空',
        //     ]);
        
        $res = $request->except(['_token','thumb']);
        if($request->hasFile('thumb')){

            //设置名字
            $name = date('Ymd').str_random(10).time();

            //获取后缀
            $suffix = $request->file('thumb')->getClientOriginalExtension();

            //移动
             $request->file('thumb')->move('./updata/',$name.'.'.$suffix);
              //存数据表
            $res['thumb'] = '/updata/'.$name.'.'.$suffix;
        }
        $res['status']='0';

        // dd($res);

        try{
            $data = goods::create($res);

            if($data){
                return redirect('/admins/goods')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back();

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
