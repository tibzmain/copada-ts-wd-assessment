

<!-- CONTENT -->
<section class="p-5">
	

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('welcome/home') ?>"> <i class="fas fa-users"></i> Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "    href="<?php echo base_url('welcome/colleges') ?>"> <i class="fas fa-graduation-cap"></i> View Colleges</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?php echo base_url('welcome/program') ?>" > <i class="fas fa-scroll"></i>  View Programs</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('welcome/course') ?>"> <i class="fab fa-discourse"></i> View Course</a>
      </li>
  
    </ul>
  </div>
  <div class="card-body">
    
    <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="btnGo" style="float: right;"> <i class="fas fa-plus"></i> Add Student </a> -->

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="50">ID</th>
          <th >PROGRAM CODE</th>
          <th>PROGRAM NAME</th>
      
        </tr>
      </thead>
      <tbody>
        <?php
              if ($students->num_rows() > 0) {
                  
                foreach($students->result() as $student){
        ?>

                  <tr>
                    <td><?php echo $student->id ?></td>
                    <td><?php echo $student->code ?></td>
                    <td><?php echo $student->name ?></td>
                    
                   
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

