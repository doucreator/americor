<?php

use yii\helpers\Html;

/**
 * @var $context \app\widgets\Export\ExportButton
 */
$context = $this->context;

echo Html::beginForm($context->getFormAction(), 'post', ['data-pjax' => $context->pjax, 'style' => 'display:inline']);
echo Html::hiddenInput($context->exportTypeParam, $context->exportType);
echo Html::hiddenInput($context->colSelFlagParam, false);
echo Html::hiddenInput($context->exportRequestParam, true);

echo Html::hiddenInput('exportParamsNames[colSelFlagParam]', $context->colSelFlagParam);
echo Html::hiddenInput('exportParamsNames[exportTypeParam]', $context->exportTypeParam);
echo Html::hiddenInput('exportParamsNames[exportRequestParam]', $context->exportRequestParam);
echo Html::submitButton($context->name, $context->options);
echo Html::endForm();