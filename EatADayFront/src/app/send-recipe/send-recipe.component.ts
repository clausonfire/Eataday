import { HttpErrorResponse } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiResponse } from '../apiResponse';
import { Recipes } from '../recipes';
import { RecipesService } from '../recipes.service';

@Component({
  selector: 'app-send-recipe',
  templateUrl: './send-recipe.component.html',
  styleUrls: ['./send-recipe.component.scss']
})
export class SendRecipeComponent {


  public recipesForm = new FormGroup({

    title: new FormControl("macarrones con tomate",[ //usuario@eataday.com
      Validators.required,
    ]),
    photo: new FormControl("Urlfoto", [
      Validators.required,
    ]),
    ingredients: new FormControl("ingredientes", [
      Validators.required,
    ]),
    displayIngredients: new FormControl("numero de ingredientes", [
      Validators.required,
    ]),
    preparation: new FormControl("preparation", [
      Validators.required,
    ]),
    description: new FormControl("description", [
      Validators.required,
    ]),
    isChecked: new FormControl(false),


  });


  public recipes: Recipes[];

  public constructor(
    private recipeService: RecipesService ,
    private route: Router

  ) { }


  ngOnInit(): void {

  }

  public recipeCheck() {
    this.recipeService.checkRecipes(this.recipesForm.value as unknown as Recipes).subscribe((res) => {
      // if(res.success) {
      //   console.log("res");

      // } else if( HttpErrorResponse ){
      //   alert("asassasas");
      // }
        console.log(res);

    })
  }

  public reset(): void {
    this.recipesForm.reset();
  }
}
