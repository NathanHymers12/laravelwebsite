    @extends('template')

    @section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h1>Questions</h1>
     <a href="{{action('QuestionController@create')}}" class="btn btn-primary">Create New Question</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Topic</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($questions as $question)
      <tr>
        <td>{{$question['id']}}</td>
        <td>{{$question['topic']}}</td>
        <td>{{$question['description']}}</td>
        <td><a href="{{action('QuestionController@edit', $question['id'])}}" 
               class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('QuestionController@destroy', $question['id'])}}" 
                        method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection
