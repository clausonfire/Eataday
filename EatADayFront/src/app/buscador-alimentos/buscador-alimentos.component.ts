import { Component } from '@angular/core';
import { debounceTime, delay, distinctUntilChanged, Observable, of, Subject, switchMap } from 'rxjs';
import { IngredientsService } from '../ingredients.service';
import { Ingredients } from '../ingredients';
import { HttpClient } from '@angular/common/http';
import { Result } from '../../../result';

@Component({
  selector: 'app-buscador-alimentos',
  templateUrl: './buscador-alimentos.component.html',
  styleUrls: ['./buscador-alimentos.component.scss']
})
export class BuscadorAlimentosComponent {

  public ingredients: Ingredients[] = [];
  public searchTerm: Subject<string> = new Subject();
  constructor(private IngredientsService: IngredientsService, private http: HttpClient) { }
  ngOnInit(): void {


    this.IngredientsService.getIngredients().pipe(delay(30)).subscribe((ingredients: Ingredients[]) => this.ingredients = ingredients);

  }
  // public search(value: string) {
  //   this.searchTerm.next(value);
  // }
}
