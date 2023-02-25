import { Component } from '@angular/core';
import { debounceTime, distinctUntilChanged, Observable, of, Subject, switchMap } from 'rxjs';
import { IngredientsService } from '../ingredients.service';
import { Ingredients } from '../ingredients';

@Component({
  selector: 'app-buscador-mixto',
  templateUrl: './buscador-mixto.component.html',
  styleUrls: ['./buscador-mixto.component.scss']
})
export class BuscadorMixtoComponent {
  public ingredients: Ingredients[] = [];
  //lleva el $ porque es asincrona
  public ingredientsFound$: Observable<Ingredients[]> = of([]);
  public searchTerm: Subject<string> = new Subject();
  constructor(private IngredientsService: IngredientsService) { }
  ngOnInit(): void {

    this.ingredientsFound$ = this.searchTerm.pipe(

      debounceTime(150),
      distinctUntilChanged(),
      switchMap(text => {
        return this.IngredientsService.searchMixIngredients(text);
      })
    )
  }

  public search(value: string) {
    this.searchTerm.next(value);
  }
}
