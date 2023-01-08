

<!-- CONTENT -->
<section class="p-5">
	

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#"> <i class="fas fa-users"></i> Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('welcome/colleges') ?>"> <i class="fas fa-graduation-cap"></i> View Colleges</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('welcome/program') ?>" > <i class="fas fa-scroll"></i>  View Programs</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('welcome/course') ?>"> <i class="fab fa-discourse"></i> View Course</a>
      </li>
  
    </ul>
  </div>
  <div class="card-body">
    
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="btnGo" style="float: right;"> <i class="fas fa-plus"></i> Add Student </a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="50">ID</th>
          <th width="100">Student #</th>
          <th>NAME</th>
          <th>COLLEGE</th>
          <th>PROGRAM</th>
          <th>COURSE CODE</th>
          <th>COURSE NAME</th>
          <th>DATE ENROLLED</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
              if ($students->num_rows() > 0) {
                  
                foreach($students->result() as $student){
        ?>

                  <tr>
                    <td><?php echo $student->id ?></td>
                    <td><?php echo $student->student_num ?></td>
                    <td><?php echo ucwords($student->lname).", ".ucwords($student->fname) ?></td>
                    <td><?php echo strtoupper($student->college) ?></td>
                    <td><?php echo strtoupper($student->program) ?></td>
                    <td><?php echo strtoupper($student->course_code) ?></td>
                    <td><?php echo $student->course_name ?></td>
                    <td><?php echo $student->created_at ?></td>
                    <td>

                      <a href="#" class="btn btn-sm btn-success btn-edit" 
                          data-id="<?php echo $student->id ?>"
                          data-num="<?php echo $student->student_num ?>"
                          data-fname="<?php echo $student->fname ?>"
                          data-lname="<?php echo $student->lname ?>"
                          data-subject="<?php echo $student->subject_id ?>"

                      ><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url() ?>welcome/delete/<?php echo $student->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" ></i></a>
                    </td>
                   
                  </tr>
        <?php

                }
              }
              else{
             ?> 
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                  </tr>
            <?php
              }

        ?> 
        
      
      </tbody>
    </table>

  </div>

<!-- ADD MODAL -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Student </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" action="<?php echo base_url('welcome/add_student') ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Student Number:</label>
          <input type="text" class="form-control" required name="student_num" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">First Name:</label>
            <input type="text" class="form-control" required placeholder="   " name="fname">
          </div>
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Last Name:</label>
            <input type="text" class="form-control" required placeholder="" name="lname">
          </div>
        </div>

        <div class="mt-3">
          <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Subject:</label>
          <select class="form-select " required name="subject" aria-label=".form-select-sm example">
            <?php
              if ($getData->num_rows() > 0) {
                  
                foreach($getData->result() as $data){
            ?>
                 
                  <option value="<?php echo $data->id ?>"><?php echo $data->code." - ".$data->name ?></option>
            <?php

                }
              }
              else{
             ?> 
                <option selected disabled>No Courses</option>
            <?php
              }

              ?> 
            
            
            
          </select>
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="submit" value="Add" class="login_btn btn btn-primary">
        </form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- END ADD MODAL -->


<!-- ADD MODAL -->
<div class="modal" id="editModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Student </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" action="<?php echo base_url('welcome/update_student') ?>">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Student Number:</label>
          <input type="text" class="form-control" required name="student_num" id="inputNum" placeholder="">
        </div>

        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">First Name:</label>
            <input type="text" class="form-control" required placeholder="" id="inputFname" name="fname">
          </div>
          <input type="hidden" name="orig_subject" id="inputOrigSub">
          <input type="hidden" name="user_id" id="inputUser">
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Last Name:</label>
            <input type="text" class="form-control" required placeholder="" id="inputLname" name="lname">
          </div>
        </div>

        <div class="mt-3">
          <label for="exampleFormControlInput1" class="form-label texx-align-left" style="float: left;">Subject:</label>
          <select class="form-select select2" required name="subject" aria-label=".form-select-sm example">
            <?php
              if ($getData->num_rows() > 0) {
              ?>

            <?php
                foreach($getData->result() as $data){

            ?>
                  
                  <option value="<?php echo $data->id ?>"><?php echo $data->code." - ".$data->name ?></option>
            <?php

                }
              }
              else{
             ?> 
                <option selected disabled>No Courses</option>
            <?php
              }

              ?> 
            
            
            
          </select>
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="submit" value="Edit" class="login_btn btn btn-success">
        </form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- END ADD MODAL -->



</div>
</section>


<?php if($this->session->flashdata('notif') != ''){ ?>
<script>
  $(document).ready(function(){
    $('.toast').toast('show');
   
  });
</script>

<?php         
}
?>

<script>
(function(){

  $('.btn-edit').click(function(e){
    e.preventDefault();

    let id = $(this).data('id');
    let studentNum = $(this).data('num');
    let fname = $(this).data('fname');
    let lname = $(this).data('lname');
    let subject = $(this).data('subject');

    $('.select2 option[value='+subject+']').attr('selected','selected');
    $('#inputNum').val(studentNum);
    $('#inputOrigSub').val(subject);
    $('#inputUser').val(id);
    $('#inputFname').val(fname);
    $('#inputLname').val(lname);
    $('#editModal').modal('show');
  });
})();
</script>

