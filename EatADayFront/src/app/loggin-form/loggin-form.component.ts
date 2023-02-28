import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";
import {LoginService} from "../login.service";
import {Login} from "../login";
import {HttpErrorResponse, HttpHeaders} from "@angular/common/http";
import {data} from "autoprefixer";
import {ApiResponse} from "../apiResponse";
import { Router } from "@angular/router";

@Component({
  selector: 'app-loggin-form',
  templateUrl: './loggin-form.component.html',
  styleUrls: ['./loggin-form.component.scss']
})

export class LogginFormComponent /*implements OnInit */{

  public loginForm = new FormGroup({
    id: new FormControl(),
    email: new FormControl("claudia1@gmail.com",[ //usuario@eataday.com
      Validators.required,
      Validators.email
    ]),
    password: new FormControl("password", [
      Validators.required,
      Validators.minLength(6)
    ]),
    terms: new FormControl("", [
      Validators.required,
      Validators.requiredTrue
    ])

  });


  public users: Login[];
  private token: string = localStorage.getItem('token');
  private headers: HttpHeaders;

  public constructor(
    private loginService: LoginService,
    private router: Router,


  ) {
/*
    this.headers = new HttpHeaders({"Accept": "application/json", "Authorization": `Bearer ${this.token}`});
*/
  }


  //  ESTO ME VALIDA SI ME DA ACCESO O NO.
  //  SI ME LO DA, ME GUARDA EL TOKEN
  public loginCheck() {
    this.loginService.login(this.loginForm.value as Login).subscribe((userData) => {
      if(userData.success) {
        console.log("Has accedido, tu token es: " + this.token);
        localStorage.setItem("token", userData.data)
        if (localStorage.getItem('token')) {
          this.router.navigate(['matchAlimentos']);
        }else{
          alert("algo esta pasnado");
        }
      } else if( HttpErrorResponse ){
        console.log("FALSE: MANTENER EN LOGIN " + userData.success);
        alert("Email or password incorrect");
      }
    })
  }











  //  UNA VEZ QUE SE HA GUARDADO EL TOKEN EN CHACHÉ,
  //  TENGO QUE VALIDAR CON EL /soyyo AL CAMBIAR DE PÁGINA DE QUE ESTOY LOGEADO,
  //  SI NO, MANDAR AL LA PAGINA DE LOGIN

  //  AL MÉTODO /soyyo, LE TENGO QUE PASAR EL TOKEN A TRAVÉS DEL HEADER.
  //  SI ES CORRECTO, QUE ME DE EL ACCESO A LA PÁGINA, SI NO, QUE MANDE AL LOGIN


  //  Al hacer logout me dice que no estoy loggeado,
  //    pasar bien el token


  // ESTO HAY QUE HACERLO EN LOGIN.GUARD
  /*public whoAMe(): void {
    this.loginService.getTokenUserLoged().subscribe((userData) => {
      console.log(userData);
    })
  }*/





  /*public logOut(): void {
      if (localStorage.getItem('token')) {
        localStorage.removeItem("token");
        return console.log("token borrado");
      }
      this.router.navigate(['login']);
      return console.log("error, NO se ha podido borrar el token");
  }*/




  public reset(): void {
    this.loginForm.reset();
  }

}


