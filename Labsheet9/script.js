<script>
  function delete_data(id) {
    if(confirm{'Are you sure to delete the record?'}){
      window.location.href = 'submitDeleteItems.php?id='+id;
    }
  }
</script>