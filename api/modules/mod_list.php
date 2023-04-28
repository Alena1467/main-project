<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <label for="age"></label>
  <input type="range" id="age" name="age" min="0" value="123" max="123" step="1" oninput="level.value = age.valueAsNumber" >
  <output for="age" name="level">123</output>
  <select name="sort">
    <option value="asc">по возрастанию</option>
    <option value="desc">по убыванию</option>
  </select>
  <input type="submit" value="фильтровать">
</form>


<?php

$extra_sql = " ";
if(isset($_POST['age'])){
    $age = $this->formatstr($_POST['age']);
    $extra_sql .= " WHERE age < $age";
  }
 
  if(isset($_POST['sort'])){
    $sort = $this->formatstr($_POST['sort']);
    $extra_sql .= " ORDER BY age $sort";
  }


// request run
$result=$this->connect->query("SELECT * FROM students".$extra_sql);
// output request result

while($row = $result->fetch_assoc()){
    echo "<div><a href='?option=details&id=$row[student_id]'>$row[lname], $row[fname], $row[gender], $row[age]</a></div>";
}

?>
