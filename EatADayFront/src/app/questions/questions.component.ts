import { Component, OnInit } from '@angular/core';
import { questionService } from '../questions.service';
import { Questions } from '../questions';

@Component({
  selector: 'app-questions',
  templateUrl: './questions.component.html',
  styleUrls: ['./questions.component.scss']
})
export class QuestionsComponent implements OnInit {

  constructor(private questionService: questionService){

  }
  allQuestions: Questions[];

  ngOnInit(): void {
    this.questionService
      .getComents()
      .subscribe((questions: Questions[]) => (this.allQuestions = questions));
    console.log(this.allQuestions);
    // this.getQuestions();
    }

  getQuestions():void{
    this.questionService
      .getComents()
      .subscribe((questions: Questions[]) => (this.allQuestions = questions));
    console.log(this.allQuestions);
  }
}
