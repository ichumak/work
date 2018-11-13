# work
$myPatch="d:\test"
$otName=get-date -uformat %d-%m-%Y
$_Date=get-date -Format HH:mm:ss
$file = "$otName.txt"
$mesg = "Дата формирования отчета:"
$mesg1="Отчет за период: "+(get-date).addDays(-2)+"`t-`t"+(get-date).addDays(-1)
echo  "`n`n" "$mesg $_Date $otName."  "`n`n$mesg1" | Out-File "$file" -Append
if($i=Get-ChildItem -Path $myPatch -Recurse -Include *.txt | Where-Object -FilterScript 
{ $_.FullName -notmatch '^*\\2\\' -and ($_.CreationTime -lt (get-date).addDays(-1)) -and ($_.CreationTime -gt (get-date).addDays(-2)) 
-and ($_.Length -ge 0mb) -and ($_.Length -le 10mb)}
 | Select-Object FullName, CreationTime, @{N='SizeInKb';E={$_.Length/1kb}}) {$i >> "$file"} else {"Файлов нет.">> "$file"}
#Get-ChildItem -Path d:\test\1,d:\test\2 -Recurse -Include *.* | Where-Object -FilterScript {($_.CreationTime -lt "10/26/2018 00:00:00") -and ($_.CreationTime -gt "10/24/2018 00:00:00") -and ($_.Length -ge 0mb) -and ($_.Length -le 10mb)} | Select-Object FullName, CreationTime, @{N='SizeInKb';E={$_.Length/1kb}} >> "$file"
pause 40
