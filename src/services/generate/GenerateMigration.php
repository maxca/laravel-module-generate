<?php

namespace Samark\ModuleGenerate\Services\Generate;

use Illuminate\Support\Str;

/**
 * Class GenerateMigration
 * @package App\Services
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class GenerateMigration extends GenerateFiles
{
    /**
     * @var array
     * set columns
     */
    protected $column;

    /**
     * @var array
     * set list of template column lists
     */
    protected $templateColumnList = [
        'base_migration'    => 'baseMigration.stub',
        'text_nullable'     => 'columnStringNull.stub',
        'text_required'     => 'columnString.stub',
        'textarea_nullable' => 'columnLongTextNull.stub',
        'textarea_required' => 'columnLongText.stub',
        'enum_nullable'     => 'columnEnumNull.stub',
        'enum_required'     => 'columnEnum.stub',
        'enum_default'      => 'columnEnumWithDefault.stub',
        'int_required'      => 'columnInteger.stub',
        'int_nullable'      => 'columnIntegerNull.stub',
    ];

    /**
     * GenerateMigration constructor.
     * @param string $namespace
     */
    public function __construct(string $namespace = '')
    {
        parent::__construct($namespace);

    }

    /**
     * @param $columns
     * @throws \Exception
     */
    public function initGenMigration($columns)
    {
        $this->setMigrationTemplatePath();
        $contents = "";
        $counter  = 0;
        foreach ($columns as $key => $column) {
            $this->column = $column;
            $template     = $this->checkColumnTypeMappingStub($column);
            $contents     .= parent::readAndReplaceFile($template);
            if ($counter != count($columns) - 1) {
                $contents .= "\n";
            }
            $counter++;
        }
        // bundle contents to base migration
        $file = $this->bundleBaseMigration($contents);

        parent::wirteFileAndMakePath(database_path('migrations/'), $this->getMigrationFileName(), $file);

    }

    /**
     * @param $column
     * @return mixed
     */
    protected function checkColumnTypeMappingStub($column)
    {
        switch ($column['type']) {
            case 'text':
                return $column['rule'] == 'required'
                    ? $this->templateColumnList['text_required']
                    : $this->templateColumnList['text_nullable'];
                break;
            case 'textarea':
                return $column['rule'] == 'required'
                    ? $this->templateColumnList['textarea_required']
                    : $this->templateColumnList['textarea_nullable'];
                break;
            case 'radio':
                $this->column['replace_value'] = arrayConcat($column['value']);
                return $this->templateColumnList['enum_required'];
                break;
            case 'checkbox':
                $this->column['replace_value'] = arrayConcat($column['value']);
                return $this->templateColumnList['enum_nullable'];
                break;
            case 'number' :
                return $column['rule'] == 'required'
                    ? $this->templateColumnList['int_required']
                    : $this->templateColumnList['int_nullable'];
                break;
            default :
                $this->templateColumnList['text_nullable'];
                break;
        }
    }

    /**
     * set template path
     * @return void
     */
    protected function setMigrationTemplatePath()
    {
        parent::setTemplatePath('public/template/migrations/');
    }

    /**
     * @return string
     */
    protected function getMigrationFileName()
    {
        return date('Y_m_d_His') . '_create_table_' . $this->replaceSmall . '.php';
    }

    /**
     * @param string $file
     * @return mixed|string
     */
    protected function replaceFile($file = '')
    {
        $file = parent::replaceFile($file);
        $file = str_replace("{column}", $this->column['name'], $file);
        $file = str_replace("{value}", $this->column['replace_value'] ?? null, $file);
        $file = str_replace("{default}", $this->column['default'] ?? null, $file);
        return $file;
    }

    /**
     * @param $contents
     * @return false|mixed|string
     */
    protected function bundleBaseMigration($contents)
    {
        $template = base_path() . '/' . $this->templatePath
            . $this->templateColumnList['base_migration'];
        $file     = file_get_contents($template);
        $file     = str_replace("{contents}", $contents, $file);
        $file     = str_replace("{replace_camel}", Str::camel($this->replace), $file);
        $file     = str_replace("{replace_plural}", $this->replacePlural, $file);
        return $file;
    }

    /**
     * @param $contents
     * @return false|mixed|string
     */
    protected function bundleBaseModel($contents)
    {
        $template = base_path() . '/' . $this->templatePath . '/Model.stub';
        $file     = file_get_contents($template);
        $file     = str_replace("{replace}", $this->replace, $file);
        $file     = str_replace("{replace_plural}", $this->replacePlural, $file);
        $file     = str_replace("{contents}", $contents, $file);
        return $file;
    }

    /**
     * @param array $columns
     */
    public function genModelFillable($columns = array())
    {
        parent::setTemplatePath('public/template/');
        $column = '';
        $count  = 0;
        foreach ($columns as $key => $value) {

            $count++;
            if ($count == 1) {
                $column .= "'{$key}',\n";
            } else {
                $column .= "\t\t'{$key}',\n";
            }

        }
        parent::wirteFileAndMakePath(app_path('/Models/'), $this->replace . '.php', $this->bundleBaseModel($column));

    }


}