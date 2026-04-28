$resources = @("Career", "Category", "Faq", "MenuItem", "Page", "Product", "Service", "Setting", "Slider", "TeamMember")

foreach ($r in $resources) {
    # 1. Update Resource.php
    $resFile = "C:\Users\2023\Herd\ATS\app\Filament\Resources\${r}Resource.php"
    if (Test-Path $resFile) {
        $content = Get-Content $resFile -Raw
        if ($content -notmatch "use Filament\\Resources\\Concerns\\Translatable;") {
            $content = $content -replace "(class ${r}Resource extends Resource\s*`r?`n\{)", "`$1`r`n    use \Filament\Resources\Concerns\Translatable;`r`n"
            Set-Content $resFile $content
            Write-Output "Updated $resFile"
        }
    }

    # 2. Update List page
    $listFileMatches = Get-ChildItem "C:\Users\2023\Herd\ATS\app\Filament\Resources\${r}Resource\Pages\List*.php" -ErrorAction SilentlyContinue
    if ($listFileMatches) {
        $listFile = $listFileMatches[0].FullName
        $content = Get-Content $listFile -Raw
        if ($content -notmatch "use Filament\\Resources\\Pages\\ListRecords\\Concerns\\Translatable;") {
            $content = $content -replace "(class List\w+ extends ListRecords\s*`r?`n\{)", "`$1`r`n    use \Filament\Resources\Pages\ListRecords\Concerns\Translatable;`r`n"
            
            if ($content -match "protected function getHeaderActions\(\): array\s*\{") {
                $content = $content -replace "(protected function getHeaderActions\(\): array\s*\{\s*return \[)", "`$1`r`n            \Filament\Actions\LocaleSwitcher::make(),"
            } else {
                $content = $content -replace "}\s*$", "`r`n    protected function getHeaderActions(): array`r`n    {`r`n        return [`r`n            \Filament\Actions\LocaleSwitcher::make(),`r`n            \Filament\Actions\CreateAction::make(),`r`n        ];`r`n    }`r`n}"
            }
            Set-Content $listFile $content
            Write-Output "Updated $listFile"
        }
    }

    # 3. Update Create page
    $createFileMatches = Get-ChildItem "C:\Users\2023\Herd\ATS\app\Filament\Resources\${r}Resource\Pages\Create*.php" -ErrorAction SilentlyContinue
    if ($createFileMatches) {
        $createFile = $createFileMatches[0].FullName
        $content = Get-Content $createFile -Raw
        if ($content -notmatch "use Filament\\Resources\\Pages\\CreateRecord\\Concerns\\Translatable;") {
            $content = $content -replace "(class Create\w+ extends CreateRecord\s*`r?`n\{)", "`$1`r`n    use \Filament\Resources\Pages\CreateRecord\Concerns\Translatable;`r`n"
            
            if ($content -match "protected function getHeaderActions\(\): array\s*\{") {
                $content = $content -replace "(protected function getHeaderActions\(\): array\s*\{\s*return \[)", "`$1`r`n            \Filament\Actions\LocaleSwitcher::make(),"
            } else {
                $content = $content -replace "}\s*$", "`r`n    protected function getHeaderActions(): array`r`n    {`r`n        return [`r`n            \Filament\Actions\LocaleSwitcher::make(),`r`n        ];`r`n    }`r`n}"
            }
            Set-Content $createFile $content
            Write-Output "Updated $createFile"
        }
    }

    # 4. Update Edit page
    $editFileMatches = Get-ChildItem "C:\Users\2023\Herd\ATS\app\Filament\Resources\${r}Resource\Pages\Edit*.php" -ErrorAction SilentlyContinue
    if ($editFileMatches) {
        $editFile = $editFileMatches[0].FullName
        $content = Get-Content $editFile -Raw
        if ($content -notmatch "use Filament\\Resources\\Pages\\EditRecord\\Concerns\\Translatable;") {
            $content = $content -replace "(class Edit\w+ extends EditRecord\s*`r?`n\{)", "`$1`r`n    use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;`r`n"
            
            if ($content -match "protected function getHeaderActions\(\): array\s*\{") {
                $content = $content -replace "(protected function getHeaderActions\(\): array\s*\{\s*return \[)", "`$1`r`n            \Filament\Actions\LocaleSwitcher::make(),"
            } else {
                $content = $content -replace "}\s*$", "`r`n    protected function getHeaderActions(): array`r`n    {`r`n        return [`r`n            \Filament\Actions\LocaleSwitcher::make(),`r`n            \Filament\Actions\DeleteAction::make(),`r`n        ];`r`n    }`r`n}"
            }
            Set-Content $editFile $content
            Write-Output "Updated $editFile"
        }
    }
}
Write-Output "Done"
