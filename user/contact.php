<?php
include_once("./database/tb_user.php");

session_start();

$update_infos = array();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id']; 
    }
    if(!empty($_POST['email']))
    {
        $update_infos['email'] = $_POST['email']; 
    }
    if(!empty($_POST['phone']))
    {
        $update_infos['phone'] = $_POST['phone']; 
    }
    if(!empty($_POST['pwd0']))
    {
        $update_infos['password'] = $_POST['pwd0']; 
roup</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="aclrules" name="aclrules">
      <tr class="success">
        <td>Jinrui</td>
        <td>Family</td>
        <td>
            <button type="button" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-danger">Block</button>
            <button type="button" class="btn btn-danger">Update</button>
        </td>
      </tr>
      <tr class="info">
        <td>Mahui</td>
        <td>Friend</td>
        <td>
            <button type="button" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-danger">Block</button>
            <button type="button" class="btn btn-danger">Update</button>
        </td>
      </tr>
      <tr class="warning">
        <td>Lijian</td>
        <td>Favorite</td>
        <td>
            <button type="button" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-danger">Block</button>
            <button type="button" class="btn btn-danger">Update</button>
        </td>
      </tr>

    </tbody>
  </table>

    </div>
    </div>




		</div>

		</div>
	</div>

			<!-- footer -->
<?php
    //include("./footer.php");
?>

			<!-- //footer -->
</div>
