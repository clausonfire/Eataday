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

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'matchAlimentos', component: MatchRecetasComponent },
  { path: 'RecipeDetail/:id', component: RecipeDetailComponent },
  { path: 'Questions', component: QuestionsComponent },
  { path: 'QuestionDetail/:id', component: QuestionDetailComponent },
  { path: 'shoppingDiary', component: ShoppingDiaryComponent },
  { path: 'supermarketDetail/:id', component: SupermarketDetailComponent },
  { path: 'closeSupermarkets/:id', component: CloseSupermarketsComponent },
  { path: '**', component: LoginComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

