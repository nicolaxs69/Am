<?php
// Connect to MySQL
$link = new mysqli( 'localhost', 'root', 'legolas4129', 'mediciones' );
if ( $link->connect_errno ) {
  die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
}

// Fetch the data
$query = "
  SELECT *
  FROM my_chart_data
  ORDER BY category ASC";
$result = $link->query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . $link->error . "n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
// while ( $row = $result->fetch_assoc() ) {
//   echo $row['category'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "n";
// }

// Print out rows in JSON
$data = array();
while ( $row = $result->fetch_assoc() ) {
  $data[] = $row;
}
echo json_encode( $data );

// Close the connection
mysqli_close($link);
?>
