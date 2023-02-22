import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { RecipesService } from '../recipes.service';
import { Recipes } from '../recipes';

@Component({
  selector: 'app-recipe-detail',
  templateUrl: './recipe-detail.component.html',
  styleUrls: ['./recipe-detail.component.scss']
})
export class RecipeDetailComponent implements OnInit {
  public recipe?: Recipes;
  constructor(private route: ActivatedRoute,private recipeService: RecipesService
  ) {

  }

  ngOnInit(): void {

    let id: number = +this.route.snapshot.paramMap.get('id');
    this.recipeService.getRecipesByID(id).subscribe((recipe: Recipes) => {
      this.recipe = recipe;
      //Hay que cambiar las comillas de las migraciones
      // this.recipe.displayIngredients=JSON.parse(this.recipe.displayIngredients);
    });


  }
}
