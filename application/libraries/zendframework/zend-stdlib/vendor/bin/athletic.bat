@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../athletic/athletic/bin/athletic
php "%BIN_TARGET%" %*
