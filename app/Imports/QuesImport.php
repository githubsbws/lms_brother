<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Users;
use App\Models\Grouptesting;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use App\Facades\AuthFacade;

class QuesImport implements ToModel, WithHeadingRow//ToCollection,
{
    //use Importable,SkipsFailures;
    /**
    * @param array $row
    * @param Collection $collection
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    
    */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        $choice = null;

        if($row['type'] == 'checkbox'){
            $ques_type = '1';
        }elseif($row['type'] == 'radio'){
            $ques_type = '2';
        }elseif($row['type'] == 'textarea'){
            $ques_type = '3';
        }
        
        if(substr($row['choice_1'], 0, 1) == '*'){
            $row['choice_1'] = substr($row['choice_1'], 1);
            $choice_answer_1 = '1';
        } else {
            $choice_answer_1 = '2';
        }
        if(substr($row['choice_2'], 0, 1) == '*'){
            $row['choice_2'] = substr($row['choice_2'], 1);
            $choice_answer_2 = '1';
        } else {
            $choice_answer_2 = '2';
        }
        if(substr($row['choice_3'], 0, 1) == '*'){
            $row['choice_3'] = substr($row['choice_3'], 1);
            $choice_answer_3 = '1';
        } else {
            $choice_answer_3 = '2';
        }
        if(substr($row['choice_4'], 0, 1) == '*'){
            $row['choice_4'] = substr($row['choice_4'], 1);
            $choice_answer_4 = '1';
        } else {
            $choice_answer_4 = '2';
        }
        $user = auth()->user()->id;
        
            $question = Question::create([
                'ques_type' =>  $ques_type ,
                'ques_title' => $row['question'],
                'active' => 'y',
                'create_date' => Carbon::now(),
                'update_date' => Carbon::now(),
                'create_by' =>$user,
                'update_by' =>$user,
                'group_id' => $this->id,
            ]);
            if($question){
                Choice::create([
                    'ques_id' => $question->ques_id,
                    'choice_detail' => $row['choice_1'],
                    'choice_answer' => $choice_answer_1,
                    'choice_type' => $row['type'],
                    'active' => 'y',
                    'create_date' => Carbon::now(),
                    'update_date' => Carbon::now(),
                    'create_by' =>$user,
                    'update_by' =>$user
                ]);  
                Choice::create([
                    'ques_id' => $question->ques_id,
                    'choice_detail' => $row['choice_2'],
                    'choice_answer' => $choice_answer_2,
                    'choice_type' => $row['type'],
                    'active' => 'y',
                    'create_date' => Carbon::now(),
                    'update_date' => Carbon::now(),
                    'create_by' =>$user,
                    'update_by' =>$user
                ]); 
                Choice::create([
                    'ques_id' => $question->ques_id,
                    'choice_detail' => $row['choice_3'],
                    'choice_answer' => $choice_answer_3,
                    'choice_type' => $row['type'],
                    'active' => 'y',
                    'create_date' => Carbon::now(),
                    'update_date' => Carbon::now(),
                    'create_by' =>$user,
                    'update_by' =>$user
                ]); 
                Choice::create([
                    'ques_id' => $question->ques_id,
                    'choice_detail' => $row['choice_4'],
                    'choice_answer' => $choice_answer_4,
                    'choice_type' => $row['type'],
                    'active' => 'y',
                    'create_date' => Carbon::now(),
                    'update_date' => Carbon::now(),
                    'create_by' =>$user,
                    'update_by' =>$user
                ]); 
            }
    }
}
    