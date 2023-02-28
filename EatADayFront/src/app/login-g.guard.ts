import { Injectable } from '@angular/core';
import {ActivatedRouteSnapshot, CanActivate, Route, Router, RouterStateSnapshot, UrlTree} from '@angular/router';
import {Observable, tap} from 'rxjs';
import {LoginService} from "./login.service";
import {HttpHeaders} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class LoginGGuard implements CanActivate {

  private token: string = localStorage.getItem('token');
  private headers: HttpHeaders;
  constructor(
    private router: Router,
    private loginService: LoginService,

  ) {
    this.headers = new HttpHeaders({"Accept": "application/json", "Authorization": `Bearer ${this.token}`});
  }

  redirect(data: boolean): void {
    if(!data) {
      this.router.navigate(['/', 'login']);
    }
  }

  /*canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    return this.loginService.getTokenUserLoged().pipe(tap(data => {
      if(!data) {
        console.log("no estas logeado");
      }else{
        console.log(data);
        console.log("si estas logeado");
      }
      return true
    }))*/


  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    if (!this.token) {
      this.router.navigate(['/login']);
      return false;
    }
    return true;
    }


    /* COGER EL TOKEN DE LOCAL STORAGE. */
    /* LUEGO, VER QUE EXISTE */











}
