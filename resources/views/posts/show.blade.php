<div class="modal fade" id="modalDetail"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;">
               <div class="row">
                   <div class="col col-md-8">
                       <img src="/storage/{{ $post->picture }}" alt="{{ $post->picture }}" width="100%">
                   </div>
                   <div class="col col-md-4">
                       <div class="header mb-4 pl-3 pr-3 pt-3">
                           <img class="icon-user" src="{{ $post->user->profile->avatar }}" alt="user" width="10%">
                           <span class="ml-2"><b>{{ $post->user->username }}</b></span>
                       </div>
                       <hr>
                       <div class="content pl-3 pb-3">
                           <img class="icon-user" src="{{ $post->user->profile->avatar }}" alt="user" width="10%">
                           <span class="ml-2"><b>{{ $post->user->username }}</b>
                           {{ $post->content }}
                           <p class="text-secondary mt-2"><small>{{ $post->created_at->diffForHumans() }}</small></p>
                           </span>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
