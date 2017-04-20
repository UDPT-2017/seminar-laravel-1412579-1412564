<?php
	@if(count($errors) > 0)
        echo "<div class='alert alert-danger'>
            <ul>";
                @foreach($errors->all() as $error)
                    echo "<li>{!! $error !!}</li>";
                @endforeach
   echo "         </ul>
        </div>"
    @endif
  ?>