@extends('layouts.app')
@section('content')
@vite(['resources/js/search.js'])
<style>
#search{
  padding: .5em .375em;
  border-radius: .375em;
  border: none; 
}
#a{
  text-decoration: none;
  transition: .3s;
  color: white;
}

</style>

<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
                <h2> Les Utilisateurs</h2>
                  
                @if($users->count() > 1)
                <div class="les_card">
                      <div class="card-body">
                          <div>
                            <input
                                name="query"
                            
                                id="search"
                                type="text"
                                placeholder="chercher avec nom ou CIN"
                                onkeyup="search()"
                                style="width: 300px; margin-left:auto;"
                              />
                          </div>
                            <div class="filter">
                              <div>
                                <input class="form-check-input"  type="checkbox" id="filterUser" name="filterUser" value="user" checked>
                                <label for="filterUser"><strong>Users</strong></label>
                              </div>
                              <div>
                                <input class="form-check-input"  type="checkbox" id="filterFormateur" name="filterFormateur" value="formateur" checked>
                                <label for="filterFormateur"><strong>Formateurs</strong></label>
                              </div>
                            </div>
                          
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          
                          @if($message = Session::get('success'))
                            <div class="text-success" role="alert">
                              {{$message}}
                            </div>
                          @endif
                            <div id="userList">
                            @foreach ($users as $user)
                            @if ($user->role != 'admin')
                            <div class="une_card">    
                                <span class="searchItem" >
                                  <a href=" {{route('access.index', ['user' => $user->id, 'userName' => $user->nom])}} ">{{ $user->CIN }} </a>
                                </span>
                              <div>
                                <span class="searchItem">
                                  <a href=" {{route('access.index', ['user' => $user->id, 'userName' => $user->nom])}} ">{{ $user->nom }} {{ $user->prenom }}</a>
                                </span>
                              </div>
                              <div>{{ $user->role }}</div>
                              <div>

                                      <button class="btn btn-primary button-43"  type="submit"> <a href="{{ route('users.show', $user->id) }}" id="a">Show</a></button>
                                    {{-- </form> --}}
                                  <form style="display: inline-block" action="{{ route('users.update', $user->id) }}" method="Post">
                                      @csrf
                                      @method('put')
                                      <button class="btn btn-primary button-43" onclick="return confirm('vous voulez le rendre formateur ?')" type="submit"> Rendre formateur</button>
                                    </form>
                                    <form style="display: inline-block" action="{{ route('users.destroy', $user->id) }}" method="Post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce utilisateur ?')" type="submit">Supprimer</button>
                                    </form>
                              </div>
                            
                            </div>
                            @endif
                            @endforeach
                            </div>
                            <div class="pagination">
                              {{ $users->links('pagination.custom') }}
                            </div>
                          </div>
                          
    </div>
    @else
      <p class="alert alert-danger text-center"> Aucun utilisateur</p>
    @endif
  </div>
  <script>
    function search() {
    var searchInput = document.getElementById('search');
    var filter = searchInput.value.toUpperCase();
    var les_card = document.querySelector('.les_card');
    var une_card = les_card.querySelectorAll('.une_card');

    une_card.forEach((card) => {
        let a1 = card.getElementsByTagName('a')[0];
        let a2 = card.getElementsByTagName('a')[1];
        txtValue1 = a1.textContent || a1.innerText;
        txtValue2 = a2.textContent || a2.innerText;
        console.log(txtValue1, txtValue2);
        if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    })
}
  </script>
  <script>
function filterUsers() {
  // Get the checked checkboxes
  const filterUser = document.getElementById("filterUser").checked;
  const filterFormateur = document.getElementById("filterFormateur").checked;

  // Get the user list
  const userList = document.getElementById("userList");

  // Loop through the user list and show/hide based on the checkboxes
  for (let i = 0; i < userList.children.length; i++) {
    const userRole = userList.children[i].querySelectorAll("div")[1].innerText;

    if ((filterUser && userRole === "user") || (filterFormateur && userRole === "formateur")) {
      userList.children[i].style.display = "";
    } else {
      userList.children[i].style.display = "none";
    }
  }
}

// Call the filter function when the checkboxes change
document.getElementById("filterUser").addEventListener("change", filterUsers);
document.getElementById("filterFormateur").addEventListener("change", filterUsers);

// Call the filter function initially to show the initial filtered list
filterUsers();
</script>
@endsection