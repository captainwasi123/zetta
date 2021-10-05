<div class="all-actions sub{{$id}} subCategoryTray arrows1">
   @foreach($data as $val)
      <div>
         <a href="javascript:void(0)" class="image-checkbox stickmans"> 
            <input type="checkbox" id="scales" name="stickmans[]" value="{{$val->name}}"> 
            <img src="{{URL::to('/public/storage/settings/sports/')}}/{{$val->image}}"> {{$val->name}} 
         </a>
      </div>
   @endforeach  
</div>