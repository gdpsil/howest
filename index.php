<?php
require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/view/header.php");

// echo phpinfo();

?>



<?php
require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/view/footer.php");
?>

<script>
/*
const existsSync = require('fs').existsSync;
const execSync = require('child_process').execSync;
const isWin = process.platform === 'win32';

let winWmic = '';
const wmicFilePath = process.env.WINDIR + '\\system32\\wbem\\wmic.exe';

try {
  const getWmic = (() => {
    if (winWmic) return winWmic;
    winWmic = existsSync(wmicFilePath) ? wmicFilePath : 'wmic';
    return winWmic;
  })()

  const winCommand = `${getWmic} cpu get name`;
  const macCommand = 'sysctl machdep.cpu';

  const commandResult = execSync(isWin ? winCommand : macCommand).toString().split(isWin ? '\r\n' : '\n');

  if (isWin) {
    console.log(commandResult[1].trim())
    return commandResult[1].trim();
  } else {
    for (let i = 0; i < commandResult.length; i++) {
      const item = commandResult[i];
      const [ key, value ] = item.split(':');
      if (key === 'machdep.cpu.brand_string') {
        console.log(value.trim())
        return value.trim();
      }
    }
  }
} catch (e) {
  console.log(e);
  return '';
}
*/
</script>