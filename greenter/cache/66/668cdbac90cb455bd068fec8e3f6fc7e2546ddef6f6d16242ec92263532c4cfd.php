<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* invoice.html.twig */
class __TwigTemplate_6401a6ffc2252f728477f613fcf8d09d6b69e0ba1b40348448431757a75eb865 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <style type=\"text/css\">
        ";
        // line 5
        $this->loadTemplate("assets/style.css", "invoice.html.twig", 5)->display($context);
        // line 6
        echo "    </style>
</head>
<body class=\"white-bg\">
";
        // line 9
        $context["cp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "company", []);
        // line 10
        $context["isNota"] = twig_in_filter($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "tipoDoc", []), [0 => "07", 1 => "08"]);
        // line 11
        $context["isAnticipo"] = ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalAnticipos", [], "any", true, true) && ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "totalAnticipos", []) > 0));
        // line 12
        $context["name"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "tipoDoc", []), "01");
        // line 13
        echo "<table width=\"100%\">
    <tbody><tr>
        <td style=\"padding:30px; !important\">
            <table width=\"100%\" height=\"200px\" border=\"0\" aling=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" height=\"90\" align=\"center\">
                        <span><img src=\"";
        // line 19
        echo $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "system", []), "logo", []));
        echo "\" height=\"80\" style=\"text-align:center\" border=\"0\"></span>
                    </td>
                    <td width=\"5%\" height=\"40\" align=\"center\"></td>
                    <td width=\"45%\" rowspan=\"2\" valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"100%\" border=\"0\" height=\"200\" cellpadding=\"6\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:29px\" text-align=\"center\">";
        // line 27
        echo (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"));
        echo "</span>
                                        <br>
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:19px\" text-align=\"center\">E L E C T R Ó N I C A</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:15px\" text-align=\"center\">R.U.C.: ";
        // line 39
        echo $this->getAttribute((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")), "ruc", []);
        echo "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        No.: <span>";
        // line 44
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "correlativo", []);
        echo "</span>
                                    </td>
                                </tr>
                                ";
        // line 47
        if ($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : null), "user", [], "any", false, true), "resolucion", [], "any", true, true)) {
            // line 48
            echo "                                <tr>
                                    <td align=\"center\">
                                        Nro. R.I. Emisor: <span>";
            // line 50
            echo $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "user", []), "resolucion", []);
            echo "</span>
                                    </td>
                                </tr>
                                ";
        }
        // line 54
        echo "                                </tbody></table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"96%\" height=\"100%\" border=\"0\" border-radius=\"\" cellpadding=\"9\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <strong><span style=\"font-size:15px\">";
        // line 64
        echo $this->getAttribute((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")), "razonSocial", []);
        echo "</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        <strong>Dirección: </strong>";
        // line 69
        echo $this->getAttribute($this->getAttribute((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")), "address", []), "direccion", []);
        echo "
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        ";
        // line 74
        echo $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "user", []), "header", []);
        echo "
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
                </tbody></table>
            <div class=\"tabla_borde\">
                ";
        // line 83
        $context["cl"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "client", []);
        // line 84
        echo "                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"60%\" align=\"left\"><strong>Razón Social:</strong>  ";
        // line 86
        echo $this->getAttribute((isset($context["cl"]) ? $context["cl"] : $this->getContext($context, "cl")), "rznSocial", []);
        echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>";
        // line 87
        echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute((isset($context["cl"]) ? $context["cl"] : $this->getContext($context, "cl")), "tipoDoc", []), "06");
        echo ":</strong>  ";
        echo $this->getAttribute((isset($context["cl"]) ? $context["cl"] : $this->getContext($context, "cl")), "numDoc", []);
        echo "</td>
                    </tr>
                    <tr>
                        <td width=\"60%\" align=\"left\">
                            <strong>Fecha Emisión: </strong>  ";
        // line 91
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "fechaEmision", []), "d/m/Y");
        echo "
                            ";
        // line 92
        if ((twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "fechaEmision", []), "H:i:s") != "00:00:00")) {
            echo " ";
            echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "fechaEmision", []), "H:i:s");
            echo " ";
        }
        // line 93
        echo "                            ";
        if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecVencimiento", [], "any", true, true) && $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "fecVencimiento", []))) {
            // line 94
            echo "                            <br><br><strong>Fecha Vencimiento: </strong>  ";
            echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "fecVencimiento", []), "d/m/Y");
            echo "
                            ";
        }
        // line 96
        echo "                        </td>
                        <td width=\"40%\" align=\"left\"><strong>Dirección: </strong>  ";
        // line 97
        if ($this->getAttribute((isset($context["cl"]) ? $context["cl"] : $this->getContext($context, "cl")), "address", [])) {
            echo $this->getAttribute($this->getAttribute((isset($context["cl"]) ? $context["cl"] : $this->getContext($context, "cl")), "address", []), "direccion", []);
        }
        echo "</td>
                    </tr>
                    ";
        // line 99
        if ((isset($context["isNota"]) ? $context["isNota"] : $this->getContext($context, "isNota"))) {
            // line 100
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Doc. Ref.: </strong>  ";
            // line 101
            echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "tipDocAfectado", []), "01");
            echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>Documento Ref.: </strong>  ";
            // line 102
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "numDocfectado", []);
            echo "</td>
                    </tr>
                    ";
        }
        // line 105
        echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Moneda: </strong>  ";
        // line 106
        echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "tipoMoneda", []), "021");
        echo " </td>
                        <td width=\"40%\" align=\"left\">";
        // line 107
        if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", [], "any", true, true) && $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "compra", []))) {
            echo "<strong>O/C: </strong>  ";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "compra", []);
        }
        echo "</td>
                    </tr>
                    ";
        // line 109
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "guias", [])) {
            // line 110
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Guias: </strong>
                        ";
            // line 112
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 113
                echo "                            ";
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "&nbsp;&nbsp;
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "</td>
                        <td width=\"40%\"></td>
                    </tr>
                    ";
        }
        // line 118
        echo "                    </tbody></table>
            </div><br>
            ";
        // line 120
        $context["moneda"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "tipoMoneda", []), "02");
        // line 121
        echo "            <div class=\"tabla_borde\">
                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody>
                        <tr>
                            <td align=\"center\" class=\"bold\">Cantidad</td>
                            <td align=\"center\" class=\"bold\">Código</td>
                            <td align=\"center\" class=\"bold\">Descripción</td>
                            <td align=\"center\" class=\"bold\">Valor Unitario</td>
                            <td align=\"center\" class=\"bold\">Valor Total</td>
                        </tr>
                        ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "details", []));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 132
            echo "                        <tr class=\"border_top\">
                            <td align=\"center\">
                                ";
            // line 134
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "cantidad", []));
            echo "
                                ";
            // line 135
            echo $this->getAttribute($context["det"], "unidad", []);
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 138
            echo $this->getAttribute($context["det"], "codProducto", []);
            echo "
                            </td>
                            <td align=\"center\" width=\"300px\">
                                <span>";
            // line 141
            echo $this->getAttribute($context["det"], "descripcion", []);
            echo "</span><br>
                            </td>
                            <td align=\"center\">
                                ";
            // line 144
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "
                                ";
            // line 145
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoValorUnitario", []));
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 148
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "
                                ";
            // line 149
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoValorVenta", []));
            echo "
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "                    </tbody>
                </table></div>
            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" valign=\"top\">
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td colspan=\"4\">
                                    <br>
                                    <br>
                                    <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:12px\" text-align=\"center\"><strong>";
        // line 164
        echo $this->env->getRuntime('Greenter\Report\Filter\ResolveFilter')->getValueLegend($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "legends", []), "1000");
        echo "</strong></span>
                                    <br>
                                    <br>
                                    <strong>Información Adicional</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    LEYENDA:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    <p>
                                        ";
        // line 180
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 181
            echo "                                        ";
            if (($this->getAttribute($context["leg"], "code", []) != "1000")) {
                // line 182
                echo "                                            ";
                echo $this->getAttribute($context["leg"], "value", []);
                echo "<br>
                                        ";
            }
            // line 184
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "                                    </p>
                                </td>
                            </tr>
                            ";
        // line 188
        if ((isset($context["isNota"]) ? $context["isNota"] : $this->getContext($context, "isNota"))) {
            // line 189
            echo "                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    MOTIVO DE EMISIÓN:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    ";
            // line 194
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "desMotivo", []);
            echo "
                                </td>
                            </tr>
                            ";
        }
        // line 198
        echo "                            ";
        if ($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : null), "user", [], "any", false, true), "extras", [], "any", true, true)) {
            // line 199
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "user", []), "extras", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 200
                echo "                                    <tr class=\"border_top\">
                                        <td width=\"30%\" style=\"font-size: 10px;\">
                                            ";
                // line 202
                echo twig_upper_filter($this->env, $this->getAttribute($context["item"], "name", []));
                echo ":
                                        </td>
                                        <td width=\"70%\" style=\"font-size: 10px;\">
                                            ";
                // line 205
                echo $this->getAttribute($context["item"], "value", []);
                echo "
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 209
            echo "                            ";
        }
        // line 210
        echo "                            </tbody>
                        </table>
                        ";
        // line 212
        if ((isset($context["isAnticipo"]) ? $context["isAnticipo"] : $this->getContext($context, "isAnticipo"))) {
            // line 213
            echo "                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td>
                                    <br>
                                    <strong>Anticipo</strong>
                                    <br>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"font-size: 10px;\">
                            <tbody>
                            <tr>
                                <td width=\"30%\"><b>Nro. Doc.</b></td>
                                <td width=\"70%\"><b>Total</b></td>
                            </tr>
                            ";
            // line 230
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "anticipos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["atp"]) {
                // line 231
                echo "                            <tr class=\"border_top\">
                                <td width=\"30%\">";
                // line 232
                echo $this->getAttribute($context["atp"], "nroDocRel", []);
                echo "</td>
                                <td width=\"70%\">";
                // line 233
                echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
                echo " ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["atp"], "total", []));
                echo "</td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 236
            echo "                            </tbody>
                        </table>
                        ";
        }
        // line 239
        echo "                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <br>
                        <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-valores-totales\">
                            <tbody>
                            ";
        // line 244
        if ((isset($context["isAnticipo"]) ? $context["isAnticipo"] : $this->getContext($context, "isAnticipo"))) {
            // line 245
            echo "                                <tr class=\"border_bottom\">
                                    <td align=\"right\"><strong>Total Anticipo:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 247
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "totalAnticipos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 250
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperGravadas", [])) {
            // line 251
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Gravadas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 253
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperGravadas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 256
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperInafectas", [])) {
            // line 257
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Inafectas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 259
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperInafectas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 262
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperExoneradas", [])) {
            // line 263
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Exoneradas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 265
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOperExoneradas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 268
        echo "                            <tr>
                                <td align=\"right\"><strong>I.G.V.";
        // line 269
        if ($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : null), "user", [], "any", false, true), "numIGV", [], "any", true, true)) {
            echo " ";
            echo $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "user", []), "numIGV", []);
            echo "%";
        }
        echo ":</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
        // line 270
        echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
        echo "  ";
        echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoIGV", []));
        echo "</span></td>
                            </tr>
                            ";
        // line 272
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoISC", [])) {
            // line 273
            echo "                            <tr>
                                <td align=\"right\"><strong>I.S.C.:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 275
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoISC", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 278
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "sumOtrosCargos", [])) {
            // line 279
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Cargos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 281
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "sumOtrosCargos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 284
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "icbper", [])) {
            // line 285
            echo "                                <tr>
                                    <td align=\"right\"><strong>I.C.B.P.E.R.:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 287
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "icbper", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 290
        echo "                            ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOtrosTributos", [])) {
            // line 291
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Tributos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 293
            echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoOtrosTributos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 296
        echo "                            <tr>
                                <td align=\"right\"><strong>Precio Venta:</strong></td>
                                <td width=\"120\" align=\"right\"><span id=\"ride-importeTotal\" class=\"ride-importeTotal\">";
        // line 298
        echo (isset($context["moneda"]) ? $context["moneda"] : $this->getContext($context, "moneda"));
        echo "  ";
        echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "mtoImpVenta", []));
        echo "</span></td>
                            </tr>
                            ";
        // line 300
        if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "perception", []) && $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "perception", []), "mto", []))) {
            // line 301
            echo "                                ";
            $context["perc"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "perception", []);
            // line 302
            echo "                                ";
            $context["soles"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog("PEN", "02");
            // line 303
            echo "                                <tr>
                                    <td align=\"right\"><strong>Percepción:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 305
            echo (isset($context["soles"]) ? $context["soles"] : $this->getContext($context, "soles"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["perc"]) ? $context["perc"] : $this->getContext($context, "perc")), "mto", []));
            echo "</span></td>
                                </tr>
                                <tr>
                                    <td align=\"right\"><strong>Total a Pagar:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 309
            echo (isset($context["soles"]) ? $context["soles"] : $this->getContext($context, "soles"));
            echo " ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute((isset($context["perc"]) ? $context["perc"] : $this->getContext($context, "perc")), "mtoTotal", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 312
        echo "                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody></table>
            <br>
            <br>
            ";
        // line 319
        if (((isset($context["max_items"]) || array_key_exists("max_items", $context)) && (twig_length_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "details", [])) > (isset($context["max_items"]) ? $context["max_items"] : $this->getContext($context, "max_items"))))) {
            // line 320
            echo "                <div style=\"page-break-after:always;\"></div>
            ";
        }
        // line 322
        echo "            <div>
                <hr style=\"display: block; height: 1px; border: 0; border-top: 1px solid #666; margin: 20px 0; padding: 0;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"85%\">
                            <blockquote>
                                ";
        // line 327
        if ($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : null), "user", [], "any", false, true), "footer", [], "any", true, true)) {
            // line 328
            echo "                                    ";
            echo $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "user", []), "footer", []);
            echo "
                                ";
        }
        // line 330
        echo "                                ";
        if (($this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : null), "system", [], "any", false, true), "hash", [], "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "system", []), "hash", []))) {
            // line 331
            echo "                                    <strong>Resumen:</strong>   ";
            echo $this->getAttribute($this->getAttribute((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), "system", []), "hash", []);
            echo "<br>
                                ";
        }
        // line 333
        echo "                                <span>Representación Impresa de la ";
        echo (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"));
        echo " ELECTRÓNICA.</span>
                            </blockquote>
                        </td>
                        <td width=\"15%\" align=\"right\">
                            <img src=\"";
        // line 337
        echo $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->env->getRuntime('Greenter\Report\Render\QrRender')->getImage((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc"))), "png");
        echo "\" alt=\"Qr Image\">
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </td>
    </tr>
    </tbody></table>
</body></html>
";
    }

    public function getTemplateName()
    {
        return "invoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  714 => 337,  706 => 333,  700 => 331,  697 => 330,  691 => 328,  689 => 327,  682 => 322,  678 => 320,  676 => 319,  667 => 312,  659 => 309,  650 => 305,  646 => 303,  643 => 302,  640 => 301,  638 => 300,  631 => 298,  627 => 296,  619 => 293,  615 => 291,  612 => 290,  604 => 287,  600 => 285,  597 => 284,  589 => 281,  585 => 279,  582 => 278,  574 => 275,  570 => 273,  568 => 272,  561 => 270,  553 => 269,  550 => 268,  542 => 265,  538 => 263,  535 => 262,  527 => 259,  523 => 257,  520 => 256,  512 => 253,  508 => 251,  505 => 250,  497 => 247,  493 => 245,  491 => 244,  484 => 239,  479 => 236,  468 => 233,  464 => 232,  461 => 231,  457 => 230,  438 => 213,  436 => 212,  432 => 210,  429 => 209,  419 => 205,  413 => 202,  409 => 200,  404 => 199,  401 => 198,  394 => 194,  387 => 189,  385 => 188,  380 => 185,  374 => 184,  368 => 182,  365 => 181,  361 => 180,  342 => 164,  329 => 153,  319 => 149,  315 => 148,  309 => 145,  305 => 144,  299 => 141,  293 => 138,  287 => 135,  283 => 134,  279 => 132,  275 => 131,  263 => 121,  261 => 120,  257 => 118,  251 => 114,  242 => 113,  238 => 112,  234 => 110,  232 => 109,  224 => 107,  220 => 106,  217 => 105,  211 => 102,  207 => 101,  204 => 100,  202 => 99,  195 => 97,  192 => 96,  186 => 94,  183 => 93,  177 => 92,  173 => 91,  164 => 87,  160 => 86,  156 => 84,  154 => 83,  142 => 74,  134 => 69,  126 => 64,  114 => 54,  107 => 50,  103 => 48,  101 => 47,  93 => 44,  85 => 39,  70 => 27,  59 => 19,  51 => 13,  49 => 12,  47 => 11,  45 => 10,  43 => 9,  38 => 6,  36 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "invoice.html.twig", "/opt/lampp/htdocs/laravel/vendor/greenter/report/src/Report/Templates/invoice.html.twig");
    }
}
