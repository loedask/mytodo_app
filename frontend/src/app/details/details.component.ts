import { Component, OnInit } from '@angular/core';
import { DataService } from '../data.service';
import { Observable } from 'rxjs';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {

    todos$ : Object;

    constructor(private data: DataService, private route: ActivatedRoute) { 
        this.route.params.subscribe(params => this.todos$ = params.id)

  ngOnInit() {
        this.data.getTodos(this.todos$).subscribe(
            data => this.todos$ = data
        );
  }

}
