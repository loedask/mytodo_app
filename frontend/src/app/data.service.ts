import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class DataService {

    constructor(private http: HttpClient) { }
    getTodos()
    {
        return this.http.get('http://localhost/mytodo_app/api/public/todos/');
    }
    getTodos(id)
    {
        return this.http.get('http://localhost/mytodo_app/api/public/todos/'+id);
    }
}
