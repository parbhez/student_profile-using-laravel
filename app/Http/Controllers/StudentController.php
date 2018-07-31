<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class StudentController extends Controller
{
    public function index()
    {
    	return view('add_student');
    }

    public function save_student(Request $request)
    {
       // return $this->imageResize($request->image);

    	$insert = DB::table('student_info')
    			->insertGetId([
    				'name' => $request->name,
    				'email' => $request->email,
    				'password' => bcrypt($request->password),
    			]);
    			//return $request->all();
    			//return $request->image;
    			if ($insert) {
    				$imageName = date('ymdhis').'-'.rand(200,2000).'-'.$insert.'.jpg';
    				$destination = 'public/images/'.$imageName;
    				move_uploaded_file($request->image,$destination);
                    $this->imageResize($destination);
    				DB::table('student_info')
    						->where('student_id',$insert)
    						->update([
    							'image' =>$imageName
    						]);
    				}
    				Session::put('message','Student data insert successfully');
    				return redirect('add-student');
    }


		    public function all_student()
            {
                $all_student = DB::table('student_info')->get();
                return view('all_student',compact('all_student'));
            }

            public function edit_student($id)
            {
                //return $id;
                $edit_student = DB::table('student_info')
                    ->where('student_id',$id)
                    ->first();
                  //print_r($edit_student);
                  return view('/edit_student',compact('edit_student'));  
            }

            public function update_student(Request $request,$id)
            {
                $student_data = DB::table('student_info')
                    ->where('student_id',$id)
                    ->first();
                 $fileName = "public/images/".$student_data->image;   
                DB::table('student_info')
                        ->where('student_id',$id)
                        ->update([
                            'name' =>$request->name,
                            'email' =>$request->email,
                        ]);
                    if (isset($request->image)) {
                            $imageName = date('ymdhis').'-'.rand(100,1000).'-'.$id.'.jpg';
                            $destination = "public/images/".$imageName;
                            move_uploaded_file($request->image,$destination);
                            $this->imageResize($destination);
                           if (file_exists($fileName)) {
                               unlink($fileName);
                           }
                            DB::table('student_info')
                                ->where('student_id',$id)
                                ->update([
                                    'image' =>$imageName
                                ]);
                        }  
                    Session::put('message','Student data Updated Successfully');
                    return redirect('all-student');      
            }

            public function delete_student($id)
            {
                //echo $id;
              $student_data = DB::table('student_info')
                    ->where('student_id',$id)
                    ->first();
               // print_r($student_data);
               // exit();  
               $fileName = "public/images/".$student_data->image;
               if (file_exists($fileName)) {
                    unlink($fileName);
                } 
                DB::table('student_info')
                        ->where('student_id',$id)
                        ->delete();

                Session::put('message','Student data deleted Successfully');  
                return redirect('all-student');      
            }

        // public function imageResize($file_name)
        // {
        //     $fileName = $file_name;
        //     list($width, $height) = getimagesize($fileName);
        //     // print $height;
        //     $newwidth = '100';
        //     $newheight = '100';
        //     $thumb = imagecreatetruecolor($newwidth,$newheight);
        //     $source = imagecreatefromjpeg($fileName);
        //     imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
        //     imagejpeg($thumb,'public/images/2.jpeg');
        //     imagedestroy($thumb);

        // }

            public function imageResize($file_name)
            {
                $fileName = $file_name;
                $destination = $file_name;
                list($width, $height) = getimagesize($fileName);
                $newwidth = '100';
                $newheight = '100';

                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($fileName);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                // Output
                imagejpeg($thumb,$destination);
                imagedestroy($thumb);
                return;

            }

}
