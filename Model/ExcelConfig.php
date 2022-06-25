<?php

namespace Model;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ExcelConfig
{

    // danh sách cot 
    static  public function GetCollums($num)
    {
        $numeric = $num % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval($num / 26);
        if ($num2 > 0) {
            return self::GetCollums($num2 - 1) . $letter;
        } else {
            return $letter;
        }
    }
    static  public function GetCellName($col, $row)
    {
        $row = max($row, 1);
        $colName = self::GetCollums($col);
        return "{$colName}{$row}";
    }

    static  public function Export($data, $fileName)
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $sheet0 = $spreadsheet->getActiveSheet();
        foreach ($data as $row => $colums) {
            $colIndex = 0;
            foreach ($colums as  $value) {
                // echo $colIndex;
                $sheet0->setCellValue(
                    ExcelConfig::GetCellName(
                        $colIndex,
                        $row + 1
                    ),
                    $value
                );
                $colIndex++;
            }
        }
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($fileName);
        Common::ToUrl("/{$fileName}");
    }
}
