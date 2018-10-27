<!--/start-footer-section-->
     <div class="footer-section">
        <div class="container">
         <div class="footer-grids">
           <div class="col-md-4 footer-grid">
           <h4>Pilihan Editor</h4>
           @foreach($users as $user)
             <div class="editor-pics">
              <div class="col-md-3 item-pic">
                @if($user->picture)
                <img src="{{asset('users/images/avatar/' . $user->picture)}}" class="img-responsive img-circle img-thumbnail" alt=""/>
                @else 
                <img src="{{asset('users/images/avatar/avatar.png')}}" class="img-responsive img-circle img-thumbnail" alt=""/>
                @endif
                </div>
                     <div class="col-md-9 item-details">
                   <h5 class="inner"><a href="#">{{$user->name}}</a></h5>
                     <div class="td-post-date"><p style="align">{!!$user->aboutme !!}</p></div>
                  </div>
               <div class="clearfix"></div>
             </div>
             @endforeach

           </div>
           <div class="col-md-4 footer-grid">
             <h4>Tag Terpopuler</h4>
               {{-- <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                      <img src="images/f4.jpg" class="img-responsive" alt=""/>

                      </div>
                     <div class="col-md-9 item-details">
                       <h5 class="inner"><a href="#">Artikel Terpopuler</a></h5>
                         <div class="td-post-date">Feb 22, 2015</div>
                      </div>
                     <div class="clearfix"></div>
                   </div> --}}

           </div>
           <div class="col-md-4 footer-grid">
               <h4>Kategori Terpopuler</h4>
               <ul class="td-pb-padding-side">
                 <li><a href="#">Macapat<span class="td-cat-no">15</span></a></li>
               </ul>
               <div class="clearfix"></div>
           </div>
           <div class="clearfix"></div>
         </div>
       </div>
     </div>
 <!--//end-footer-section-->
     <!--/start-copyright-section-->
       <div class="copyright">
             <p>&copy; 2018 E-MacapatKU. All Rights Reserved</p>
         </div>
