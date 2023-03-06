import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { MatchRecetasComponent } from './match-recetas/match-recetas.component';
import { RecipeDetailComponent } from './recipe-detail/recipe-detail.component';
import { ShoppingDiaryComponent } from './shopping-diary/shopping-diary.component';
import { CloseSupermarketsComponent } from './close-supermarkets/close-supermarkets.component';
import { SupermarketDetailComponent } from './supermarket-detail/supermarket-detail.component';
import { QuestionDetailComponent } from './question-detail/question-detail.component';
import { QuestionsComponent } from './questions/questions.component';
import { SendRecipeComponent } from './send-recipe/send-recipe.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'matchAlimentos', component: MatchRecetasComponent },
  { path: 'RecipeDetail/:id', component: RecipeDetailComponent },
  { path: 'questions', component: QuestionsComponent },
  { path: 'questionDetail/:id', component: QuestionDetailComponent },
  { path: 'shoppingDiary', component: ShoppingDiaryComponent },
  { path: 'supermarketDetail/:id', component: SupermarketDetailComponent },
  { path: 'closeSupermarkets/:id', component: CloseSupermarketsComponent },
  { path: 'send-recipe', component: SendRecipeComponent },
  { path: '**', component: LoginComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

