<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choice;
use App\Models\Score;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Manage;
use App\Models\Learn;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChoiceController extends Controller
{
   function choiceAnswer($id, Request $request)
   {
      $score = 0;
      // $request->input('Choice');
      // dd($request);
      // เช็คคำตอบข้อกา
      foreach ($request->input('Choice') as $ques_id => $selected_choices) {
         $correct_choices = Choice::where([
            'ques_id' => $ques_id,
            'active' => 'y',
            'choice_answer' => 1,
         ])->pluck('choice_id')->toArray();
         $is_correct = array_diff($selected_choices, $correct_choices) === array_diff($correct_choices, $selected_choices);
         if ($is_correct) {
            $score++;
         }
      }
      // เช็คคำตอบข้อเขียน
      $choice_text = $request->input('ChoiceText');
      if (!is_null($choice_text) && is_array($choice_text)) {
         foreach ($choice_text as $ques_id => $text_answer) {
            $correct_answer = Choice::where([
               'ques_id' => $ques_id,
               'active' => 'y',
               'choice_answer' => 1,
            ])->value('choice_detail');
            $is_correct_text = ($text_answer == $correct_answer);
            if ($is_correct_text) {
               $score++;
            }
         }
      }
      $ptest = Manage::where(['id' => $id, 'active' => 'y'])->first();
      $users = User::where(['id' => Auth::user()->id])->first();
      $lesson = Lesson::where(['id' => $id, 'active' => 'y'])->first();
      $score_total = ($ptest->manage_row/2);
      if($score>$score_total){
         $score_past = 'y';
      }else{
         $score_past = 'n';
      }
      // dd($score_past);
      $scores = New Score;
      $scores->lesson_id = $lesson->id;
      $scores->user_id = $users->id;
      $scores->course_id = $lesson->course_id;
      $scores->type = $ptest->type;
      $scores->score_number = $score;
      $scores->score_total = $ptest->manage_row;
      $scores->score_past = $score_past;
      $scores->active = 'y';
      $scores->create_by = $users->id;
      $scores->update_by = $users->id;
      $scores->save();
      // $scoress=$scores->create([
      //    'score_id'  => $scores->score_id,
      //    'lesson_id'    => $lesson->id,
      //    'user_id'      => $users->id,
      //    'course_id'    => $lesson->course_id,
      //    'type'         => $ptest->type,
      //    'score_number' => $score,
      //    'score_total'  => $ptest->manage_row,
      //    'score_past'   => $score_past,
      //    'create_by'    => $users->id,
      //    'create_date'  => now(),
      //    'update_by'    => $users->id,
      //    'update_date'  => now(),
      //    'active'       => 'y',
         
      // ]);
      //   dd($scores->toArray());
      return redirect()->route('index');
   }
}
