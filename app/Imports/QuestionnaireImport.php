<?php

namespace App\Imports;

use App\Models\QHeader;
use App\Models\QSection;
use App\Models\QQuestion;
use App\Models\QChoice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use App\Facades\AuthFacade;

class QuestionnaireImport implements ToModel, WithHeadingRow//ToCollection,
{
    //use Importable,SkipsFailures;
    /**
    * @param array $row
    * @param Collection $collection
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    
    */
    

    public function model(array $row)
    {
        $ques_type = null;
        if($row['type'] == 'คำตอบบรรทัดเดียว'){
            $ques_type = '1';
        }elseif($row['type'] == 'คำตอบแบบเลือกคำตอบเดียว'){
            $ques_type = '2';
        }elseif($row['type'] == 'คำตอบแบบเลือกได้หลายคำตอบ'){
            $ques_type = '3';
        }elseif($row['type'] == 'ความพึงพอใจ'){
            $ques_type = '4';
        }elseif($row['type'] == 'คำตอบแบบหลายบรรทัด'){
            $ques_type = '5';
        } 
        // dd($ques_type);
        if(substr($row['option_choice_1'], 0, 1) == '*'){
            $row['option_choice_1'] = substr($row['choice_1'], 1);
        } 
        if(substr($row['option_choice_2'], 0, 1) == '*'){
            $row['option_choice_2'] = substr($row['choice_2'], 1);
        }
        if(substr($row['option_choice_3'], 0, 1) == '*'){
            $row['option_choice_3'] = substr($row['choice_3'], 1);
        }
        if(substr($row['option_choice_4'], 0, 1) == '*'){
            $row['option_choice_4'] = substr($row['choice_4'], 1); 
        } 

            $header = QHeader::create([
                'survey_name' =>  $row['survey_name'] ,
                'instructions' => $row['instructions'],
                'active' => 'y'
            ]);
            // dd($header);
            if($header){
                $section = QSection::create([
                    'survey_header_id' => $header->survey_header_id,
                    'section_title' => $row['section_title'],
                    'section_required_yn' => 'n',
                ]); 
                // dd($section->servey_section_id);
                $question = QQuestion::create([
                    'survey_section_id' => $section->survey_section_id,
                    'input_type_id' => $ques_type,
                    'question_name' => $row['question_name'],
                    'answer_required_yn' => 'n',
                    'allow_multiple_option_answers_yn' => 'n'
                ]); 
                    QChoice::create([
                        'question_id' => $question->question_id,
                        'option_choice_name' => $row['option_choice_1'],
                        'option_choice_type' => 'normal'
                    ]); 
                    QChoice::create([
                        'question_id' => $question->question_id,
                        'option_choice_name' => $row['option_choice_2'],
                        'option_choice_type' => 'normal'
                    ]); 
                    QChoice::create([
                        'question_id' => $question->question_id,
                        'option_choice_name' => $row['option_choice_3'],
                        'option_choice_type' => 'normal'
                    ]); 
                    QChoice::create([
                        'question_id' => $question->question_id,
                        'option_choice_name' => $row['option_choice_4'],
                        'option_choice_type' => 'normal'
                    ]); 
                    
            }
    }
}
    