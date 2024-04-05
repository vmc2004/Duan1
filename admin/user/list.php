<table class="table mt-4">
<br>
     <br>
     <h2 class="text-center text-primary mt-3">List User</h2>
     <thead>
     <tr>
          <th scope="col">#</th>   
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Tel</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
     <?php foreach ($result as $us) { ?>
          <tr>
               <td  scope="col"><?=$us['id_user']?></td>
               <td  scope="col"><?=$us['name_user']?></td>
               <td  scope="col"><?=$us['email']?></td>
               <td  scope="col"><?=$us['sdt']?></td>
               <td  scope="col"><?=$us['role']?></td>
               <td  scope="col"><button class="btn btn-info"><a href="?act=edit-user&id_user=<?=$us['id_user']?>"><i class="fa-solid fa-user-pen text-white"></i></a></button>
               <button class="btn btn-danger"><a href="?act=delete-user&id_user=<?=$us['id_user']?>"><i class="fa-solid fa-user-xmark text-white"></i></i></a></button>
          </td>
     </tr>

     <?php } ?>     
     
     </tbody>
</table>
<a href="index.php?act=add-category" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Add User</a>