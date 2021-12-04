@extends('layout.app')
@section('title','Review')
@section('content')
<div id="maindivReview" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-3">
      <button id="AddNewReviewBtnID" class="normal-btn">Add New Review</button>
    <table id="ReviewTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>

          <th class="th-sm">Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Update</th>
          <th class="th-sm">Delete</th>

        </tr>
      </thead>
      <tbody id="Review_table">
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="loaderdivReview" class="container">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <img class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
          </div>
      </div>
  </div>
  
  
  
  <div id="wrongdivReview" class="container d-none">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <h3>Something went wrong</h3> 
          </div>
      </div>
  </div>




  <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="ReviewNameId" type="text" id="" class="form-control mb-3" placeholder="Name">
          	 	<input id="ReviewDesId" type="text" id="" class="form-control mb-3" placeholder="Description">
                <input id="ReviewImgId" type="text" id="" class="form-control mb-3" placeholder="Image">
       		</div>
       		
       	
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
        <button  id="ReviewAddConfirmBtn" type="button" class="normal-btn">Save</button>
      </div>
    </div>
  </div>
</div>


<div
  class="modal fade"
  id="Reviewdeletemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h6>Do you want to delete?</h6>
          <h5 id="ReviewDeleteID" class=""> </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          No
        </button>
        <button type="button" data-id="" id="Reviewdeleteconfirm" class="normal-btn">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="UpdateReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title">Update Review</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body  text-center">
     <div id="ReviewEditForm" class="container">
      <h5 id="ReviewEditID" class="d-none"></h5>
       <div class="row">
        <div class="col-md-6">
            <input id="ReviewNameupdateId" type="text" id="" class="form-control mb-3" placeholder="Name">
              <input id="ReviewDesupdateId" type="text" id="" class="form-control mb-3" placeholder="Description">
           <input id="ReviewImgupdateId" type="text" id="" class="form-control mb-3" placeholder="Image">
          </div>
       </div>
     </div>

     <img id="ReviewEditLoader" class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
     <h3 id="ReviewEditWrong" class="d-none">Something went wrong</h3> 

    </div>
    <div class="modal-footer">
      <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
      <button  id="ReviewEditConfirmBtn" type="button" class="normal-btn">Save</button>
    </div>
  </div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  getReviewdata();
 
</script>    
@endsection