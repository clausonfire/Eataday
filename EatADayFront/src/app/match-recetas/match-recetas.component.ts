import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-match-recetas',
  templateUrl: './match-recetas.component.html',
  styleUrls: ['./match-recetas.component.scss']
})
export class MatchRecetasComponent {
  public showFinder: boolean = false;

  public getShowFinder(): void {
    this.showFinder = !this.showFinder;
  }
}
