<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $user->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <img src="{{ $user->image->url }}" class="float-left rounded mr-2" >
                <h1 class="text-dark">{{ $user->name }}</h1> <!-- Cambiado a texto negro -->
                <h3 class="text-dark">{{ $user->email }}</h3> <!-- Cambiado a texto negro -->
                <p class="text-dark"> <!-- Cambiado a texto negro -->
                    <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                    <strong>GitHub</strong>: {{ $user->profile->github }}<br>
                    <strong>Web</strong>: {{ $user->profile->web }}<br>
                </p>
                <p class="text-dark"> <!-- Cambiado a texto negro -->
                    <strong>País</strong>: {{ $user->location->country }}<br>
                    <strong>Nivel</strong>: 
                    @if($user->level)
                        <a href="{{route('level',$user->level->id)}}" class="text-dark"> <!-- Enlace en negro -->
                            {{ $user->level->name }}</a>
                    @else
                        ---
                    @endif
                    <br>
                </p>
                <hr>
                <p class="text-dark"> <!-- Cambiado a texto negro -->
                    <strong>Grupos</strong>:
                    @forelse ($user->groups as $group)
                        <span class="badge bg-primary text-dark">{{ $group->name }}</span> <!-- Etiquetas de grupo en negro -->
                    @empty
                        <em>No pertenece a algún grupo</em>
                    @endforelse
                </p>
                <hr>

                <h3 class="text-dark">Posts</h3> <!-- Cambiado a texto negro -->

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title text-dark">{{ $post->name }}</h5> <!-- Título en negro -->
                                          <h6 class="card-subtitle text-dark"> <!-- Subtítulo en negro -->
                                            {{ $post->category->name }} |
                                            {{ $post->comments_count }}
                                            {{ str()->plural('comentario', $post->comments_count) }}
                                          </h6>
                                          <p class="card-text small">
                                            @foreach ($post->tags as $tag )
                                            <span class="badge bg-light text-dark"> <!-- Etiquetas en negro -->
                                                #{{ $tag->name }}
                                            </span>
                                            @endforeach
                                          </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h3 class="text-dark">Videos</h3> <!-- Cambiado a texto negro -->

                <div class="row">
                    @foreach ($videos as $video)
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $video->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                           <h5 class="card-title text-dark">{{ $video->name }}</h5> <!-- Título en negro -->
                                           <h6 class="card-subtitle text-dark"> <!-- Subtítulo en negro -->
                                            {{ $video->category->name }} |
                                            {{ $video->comments_count }}
                                            {{ str()->plural('comentario', $video->comments_count) }}
                                          </h6>
                                          <p class="card-text small">
                                            @foreach ($video->tags as $tag )
                                            <span class="badge bg-light text-dark"> <!-- Etiquetas en negro -->
                                                #{{ $tag->name }}
                                            </span>
                                            @endforeach
                                         </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>