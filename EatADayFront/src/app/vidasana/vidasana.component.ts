import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { delay, Subject } from 'rxjs';
import { Recommendations } from '../recommendations';
import { RecommendationsService } from '../recommendations.service';


@Component({
  selector: 'app-vidasana',
  templateUrl: './vidasana.component.html',
  styleUrls: ['./vidasana.component.scss']
})
export class VidasanaComponent {

  public topRecomm: Recommendations[] = [];
  public searchTerm: Subject<string> = new Subject();
  constructor(private RecommendationsService: RecommendationsService, private http: HttpClient) { }
  ngOnInit(): void {


    this.RecommendationsService.getRecommendations().pipe(delay(30)).subscribe((Recommendations: Recommendations[]) => this.topRecomm = Recommendations);

  }

}
