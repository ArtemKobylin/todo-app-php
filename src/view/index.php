<h4>List of Todos</h4>

<div class="row">
  <table class="table">
    <tr>
      <th>Title</th>
      <th>Username</th>
      <th>Email</th>
      <th>Status</th>
      <th>Edited By Admin</th>
      {{#user}}
        <th>Action</th>
      {{/user}}
    </tr>
    {{#todos}}
      <tr>
        <td>{{title}}</td>
        <td>{{username}}</td>
        <td>{{email}}</td>
        <td>
          {{#isDone}}
            <span>Done</span>
          {{/isDone}}
          {{^isDone}}
            <span>In Progress</span>
          {{/isDone}}
        </td>
        <td>
          {{#editedByAdmin}}
            <span>Yes</span>
          {{/editedByAdmin}}
          {{^editedByAdmin}}
            <span>No</span>
          {{/editedByAdmin}}
        </td>
        {{#user}}
          <td>
            <form class="form-inline my-2 my-lg-0 ml-4" action="/home/edit/{{tid}}">
              <button class='btn btn-outline-primary' type='submit'>Edit</button>
            </form>
          </td>
        {{/user}}
      </tr>
    {{/todos}}
  </table>
</div>
<div class="row">
  <div class="col-8">
    <form class="form-inline my-2 my-lg-0" action="/home/add">
      <button class='btn btn-outline-success' type='submit'>Create New Todo</button>
    </form>
  </div>
  <div class="col-4">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        {{#previous}}
          <li class="page-item"><a class="page-link m-1" href="{{previous}}">Previous</a></li>
        {{/previous}}
        {{^previous}}
          <li class="page-item"><a class="page-link m-1 disabled" href="#">Previous</a></li>
        {{/previous}}
        {{#next}}
          <li class="page-item"><a class="page-link m-1" href="{{next}}">Next</a></li>
        {{/next}}
        {{^next}}        
          <li class="page-item"><a class="page-link m-1 disabled" href="#" disabled>Next</a></li>
        {{/next}}
      </ul>
    </nav>
  </div>
</div>