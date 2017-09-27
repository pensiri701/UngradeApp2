<h1>Current committees:</h1>
@foreach ($project->committees as $committee)
  <li>{{ $committee->staff->username }}, {{ $committee->type }}</li>
@endforeach
