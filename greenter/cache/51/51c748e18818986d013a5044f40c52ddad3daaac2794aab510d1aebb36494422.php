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

/* invoice2.0.xml.twig */
class __TwigTemplate_bb29a378f194654462ebe755a569e6b3b8c492ec0bfb5e7bfb84d77c4786fdd7 extends \Twig\Template
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
        ob_start(function () { return ''; });
        // line 2
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\" xmlns:sac=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent>
                <sac:AdditionalInformation>
                    ";
        // line 8
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoDescuentos", [])) {
            // line 9
            echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>2005</cbc:ID>
                        <cbc:PayableAmount currencyID=\"";
            // line 11
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoDescuentos", [])]);
            echo "</cbc:PayableAmount>
                    </sac:AdditionalMonetaryTotal>
                    ";
        }
        // line 14
        echo "                    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])) {
            // line 15
            echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>1001</cbc:ID>
                        <cbc:PayableAmount currencyID=\"";
            // line 17
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])]);
            echo "</cbc:PayableAmount>
                    </sac:AdditionalMonetaryTotal>
                    ";
        }
        // line 20
        echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>1002</cbc:ID>
                        <cbc:PayableAmount currencyID=\"";
        // line 22
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperInafectas", [])]);
        echo "</cbc:PayableAmount>
                    </sac:AdditionalMonetaryTotal>
                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>1003</cbc:ID>
                        <cbc:PayableAmount currencyID=\"";
        // line 26
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExoneradas", [])]);
        echo "</cbc:PayableAmount>
                    </sac:AdditionalMonetaryTotal>
                    ";
        // line 28
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])) {
            // line 29
            echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>1004</cbc:ID>
                        <cbc:PayableAmount currencyID=\"";
            // line 31
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])]);
            echo "</cbc:PayableAmount>
                    </sac:AdditionalMonetaryTotal>
                    ";
        }
        // line 34
        echo "                    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "detraccion", [])) {
            // line 35
            echo "                    ";
            $context["detr"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "detraccion", []);
            // line 36
            echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID>2003</cbc:ID>
                        ";
            // line 38
            if ($this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "valueRef", [])) {
                // line 39
                echo "                         <cbc:ReferenceAmount currencyID=\"PEN\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "valueRef", [])]);
                echo "</cbc:ReferenceAmount>
                        ";
            }
            // line 41
            echo "                        <cbc:PayableAmount currencyID=\"PEN\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "mount", [])]);
            echo "</cbc:PayableAmount>
                        <cbc:Percent>";
            // line 42
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "percent", [])]);
            echo "</cbc:Percent>
                    </sac:AdditionalMonetaryTotal>
                    ";
        }
        // line 45
        echo "                    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", [])) {
            // line 46
            echo "                    ";
            $context["perc"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", []);
            // line 47
            echo "                    <sac:AdditionalMonetaryTotal>
                        <cbc:ID schemeID=\"";
            // line 48
            echo $this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "codReg", []);
            echo "\">2001</cbc:ID>
                        <sac:ReferenceAmount currencyID=\"PEN\">";
            // line 49
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mtoBase", [])]);
            echo "</sac:ReferenceAmount>
                        <cbc:PayableAmount currencyID=\"PEN\">";
            // line 50
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mto", [])]);
            echo "</cbc:PayableAmount>
                        <sac:TotalAmount currencyID=\"PEN\">";
            // line 51
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mtoTotal", [])]);
            echo "</sac:TotalAmount>
                    </sac:AdditionalMonetaryTotal>
                    <sac:AdditionalProperty>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Value>COMPROBANTE DE PERCEPCION</cbc:Value>
                    </sac:AdditionalProperty>
                    ";
        }
        // line 58
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 59
            echo "                    <sac:AdditionalProperty>
                        <cbc:ID>";
            // line 60
            echo $this->getAttribute($context["leg"], "code", []);
            echo "</cbc:ID>
                        <cbc:Value>";
            // line 61
            echo $this->getAttribute($context["leg"], "value", []);
            echo "</cbc:Value>
                    </sac:AdditionalProperty>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guiaEmbebida", [])) {
            // line 65
            echo "                    ";
            $this->loadTemplate("embededDespatch.xml.twig", "invoice2.0.xml.twig", 65)->display(twig_to_array(["desp" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guiaEmbebida", [])]));
            // line 66
            echo "                    ";
        }
        // line 67
        echo "                    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoOperacion", [])) {
            // line 68
            echo "                    <sac:SUNATTransaction>
                        <cbc:ID>";
            // line 69
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoOperacion", []);
            echo "</cbc:ID>
                    </sac:SUNATTransaction>
                    ";
        }
        // line 72
        echo "                </sac:AdditionalInformation>
            </ext:ExtensionContent>
        </ext:UBLExtension>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
    <cbc:CustomizationID>1.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 81
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "correlativo", []);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 82
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 83
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
    <cbc:InvoiceTypeCode>";
        // line 84
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoDoc", []);
        echo "</cbc:InvoiceTypeCode>
    <cbc:DocumentCurrencyCode>";
        // line 85
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "</cbc:DocumentCurrencyCode>
    ";
        // line 86
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", [])) {
            // line 87
            echo "    <cac:OrderReference>
        <cbc:ID>";
            // line 88
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", []);
            echo "</cbc:ID>
    </cac:OrderReference>
    ";
        }
        // line 91
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", [])) {
            // line 92
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 93
                echo "    <cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 94
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 95
                echo $this->getAttribute($context["guia"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "    ";
        }
        // line 99
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", [])) {
            // line 100
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", []));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 101
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 102
                echo $this->getAttribute($context["rel"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 103
                echo $this->getAttribute($context["rel"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "    ";
        }
        // line 107
        echo "    ";
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 108
        echo "    <cac:Signature>
        <cbc:ID>";
        // line 109
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 112
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 115
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#GREENTER-SIGN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cbc:CustomerAssignedAccountID>";
        // line 125
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:CustomerAssignedAccountID>
        <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
        <cac:Party>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 129
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
            ";
        // line 131
        $context["addr"] = $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "address", []);
        // line 132
        echo "            <cac:PostalAddress>
                <cbc:ID>";
        // line 133
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
        echo "</cbc:ID>
                <cbc:StreetName><![CDATA[";
        // line 134
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
        echo "]]></cbc:StreetName>
                <cbc:CityName>";
        // line 135
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "departamento", []);
        echo "</cbc:CityName>
                <cbc:CountrySubentity>";
        // line 136
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "provincia", []);
        echo "</cbc:CountrySubentity>
                <cbc:District>";
        // line 137
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "distrito", []);
        echo "</cbc:District>
                <cac:Country>
                    <cbc:IdentificationCode>";
        // line 139
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 143
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
            ";
        // line 145
        if (($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []) || $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []))) {
            // line 146
            echo "            <cac:Contact>
                ";
            // line 147
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", [])) {
                // line 148
                echo "                <cbc:Telephone>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 150
            echo "                ";
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", [])) {
                // line 151
                echo "                <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 153
            echo "            </cac:Contact>
            ";
        }
        // line 155
        echo "        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 157
        $context["client"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "client", []);
        // line 158
        echo "    <cac:AccountingCustomerParty>
        <cbc:CustomerAssignedAccountID>";
        // line 159
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "numDoc", []);
        echo "</cbc:CustomerAssignedAccountID>
        <cbc:AdditionalAccountID>";
        // line 160
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "tipoDoc", []);
        echo "</cbc:AdditionalAccountID>
        <cac:Party>
            ";
        // line 162
        if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", [])) {
            // line 163
            echo "            ";
            $context["addr"] = $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", []);
            // line 164
            echo "            <cac:PostalAddress>
                ";
            // line 165
            if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", [])) {
                // line 166
                echo "                <cbc:ID>";
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
                echo "</cbc:ID>
                ";
            }
            // line 168
            echo "                <cbc:StreetName><![CDATA[";
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
            echo "]]></cbc:StreetName>
                <cac:Country>
                    <cbc:IdentificationCode>";
            // line 170
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            ";
        }
        // line 174
        echo "            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 175
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
            ";
        // line 177
        if (($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []) || $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []))) {
            // line 178
            echo "            <cac:Contact>
                ";
            // line 179
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", [])) {
                // line 180
                echo "                <cbc:Telephone>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 182
            echo "                ";
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", [])) {
                // line 183
                echo "                <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 185
            echo "            </cac:Contact>
            ";
        }
        // line 187
        echo "        </cac:Party>
    </cac:AccountingCustomerParty>
    ";
        // line 189
        $context["seller"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "seller", []);
        // line 190
        echo "    ";
        if ((isset($context["seller"]) ? $context["seller"] : null)) {
            // line 191
            echo "    <cac:SellerSupplierParty>
        <cbc:CustomerAssignedAccountID>";
            // line 192
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "numDoc", []);
            echo "</cbc:CustomerAssignedAccountID>
        <cbc:AdditionalAccountID>";
            // line 193
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "tipoDoc", []);
            echo "</cbc:AdditionalAccountID>
        <cac:Party>
            ";
            // line 195
            if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "address", [])) {
                // line 196
                echo "            ";
                $context["addr"] = $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "address", []);
                // line 197
                echo "            <cac:PostalAddress>
                ";
                // line 198
                if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", [])) {
                    // line 199
                    echo "                <cbc:ID>";
                    echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
                    echo "</cbc:ID>
                ";
                }
                // line 201
                echo "                <cbc:StreetName><![CDATA[";
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
                echo "]]></cbc:StreetName>
                <cac:Country>
                    <cbc:IdentificationCode>";
                // line 203
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
                echo "</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            ";
            }
            // line 207
            echo "            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 208
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "rznSocial", []);
            echo "]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
            ";
            // line 210
            if (($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", []) || $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", []))) {
                // line 211
                echo "            <cac:Contact>
                ";
                // line 212
                if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", [])) {
                    // line 213
                    echo "                <cbc:Telephone>";
                    echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", []);
                    echo "</cbc:Telephone>
                ";
                }
                // line 215
                echo "                ";
                if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", [])) {
                    // line 216
                    echo "                <cbc:ElectronicMail>";
                    echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", []);
                    echo "</cbc:ElectronicMail>
                ";
                }
                // line 218
                echo "            </cac:Contact>
            ";
            }
            // line 220
            echo "        </cac:Party>
    </cac:SellerSupplierParty>
    ";
        }
        // line 223
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecVencimiento", [])) {
            // line 224
            echo "    <cac:PaymentMeans>
        <cbc:PaymentMeansCode>-</cbc:PaymentMeansCode>
        <cbc:PaymentDueDate>";
            // line 226
            echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecVencimiento", []), "Y-m-d");
            echo "</cbc:PaymentDueDate>
    </cac:PaymentMeans>
    ";
        }
        // line 229
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", [])) {
            // line 230
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 231
                echo "    <cac:PrepaidPayment>
        <cbc:ID schemeID=\"";
                // line 232
                echo $this->getAttribute($context["ant"], "tipoDocRel", []);
                echo "\">";
                echo $this->getAttribute($context["ant"], "nroDocRel", []);
                echo "</cbc:ID>
        <cbc:PaidAmount currencyID=\"";
                // line 233
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["ant"], "total", [])]);
                echo "</cbc:PaidAmount>
        <cbc:InstructionID schemeID=\"6\">";
                // line 234
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
                echo "</cbc:InstructionID>
    </cac:PrepaidPayment>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 237
            echo "    ";
        }
        // line 238
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])) {
            // line 239
            echo "    ";
            $context["iscT"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])]);
            // line 240
            echo "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
            // line 241
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo (isset($context["iscT"]) ? $context["iscT"] : null);
            echo "</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxAmount currencyID=\"";
            // line 243
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo (isset($context["iscT"]) ? $context["iscT"] : null);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>2000</cbc:ID>
                    <cbc:Name>ISC</cbc:Name>
                    <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    ";
        }
        // line 254
        echo "    ";
        $context["igvT"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [(($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", []), 0)) : (0))]);
        // line 255
        echo "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 256
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo (isset($context["igvT"]) ? $context["igvT"] : null);
        echo "</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxAmount currencyID=\"";
        // line 258
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo (isset($context["igvT"]) ? $context["igvT"] : null);
        echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    ";
        // line 268
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])) {
            // line 269
            echo "    ";
            $context["othT"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])]);
            // line 270
            echo "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
            // line 271
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo (isset($context["othT"]) ? $context["othT"] : null);
            echo "</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxAmount currencyID=\"";
            // line 273
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo (isset($context["othT"]) ? $context["othT"] : null);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>9999</cbc:ID>
                    <cbc:Name>OTROS</cbc:Name>
                    <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    ";
        }
        // line 284
        echo "    <cac:LegalMonetaryTotal>
        <cbc:AllowanceTotalAmount currencyID=\"";
        // line 285
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [(($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumDsctoGlobal", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumDsctoGlobal", []), 0)) : (0))]);
        echo "</cbc:AllowanceTotalAmount>
        <cbc:ChargeTotalAmount currencyID=\"";
        // line 286
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [(($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", []), 0)) : (0))]);
        echo "</cbc:ChargeTotalAmount>
        ";
        // line 287
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalAnticipos", [])) {
            echo "<cbc:PrepaidAmount currencyID=\"";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalAnticipos", [])]);
            echo "</cbc:PrepaidAmount>";
        }
        // line 288
        echo "        <cbc:PayableAmount currencyID=\"";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoImpVenta", [])]);
        echo "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
        // line 290
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "details", []));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["detail"]) {
            // line 291
            echo "    <cac:InvoiceLine>
        <cbc:ID>";
            // line 292
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"";
            // line 293
            echo $this->getAttribute($context["detail"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["detail"], "cantidad", []);
            echo "</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 294
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorVenta", [])]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 296
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 297
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 298
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", [])]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 302
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 303
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", [])]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 307
            echo "        </cac:PricingReference>
        ";
            // line 308
            if ($this->getAttribute($context["detail"], "descuento", [])) {
                // line 309
                echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>00</cbc:AllowanceChargeReasonCode>
            <cbc:Amount currencyID=\"";
                // line 312
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "descuento", [])]);
                echo "</cbc:Amount>
        </cac:AllowanceCharge>
        ";
            }
            // line 315
            echo "        ";
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 316
                echo "        ";
                $context["isc"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                // line 317
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 318
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo (isset($context["isc"]) ? $context["isc"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 320
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo (isset($context["isc"]) ? $context["isc"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:TierRange>";
                // line 322
                echo $this->getAttribute($context["detail"], "tipSisIsc", []);
                echo "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            }
            // line 332
            echo "        ";
            if ($this->getAttribute($context["detail"], "igv", [])) {
                // line 333
                echo "        ";
                $context["igv"] = call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
                // line 334
                echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 335
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo (isset($context["igv"]) ? $context["igv"] : null);
                echo "</cbc:TaxAmount>
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 337
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo (isset($context["igv"]) ? $context["igv"] : null);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:TaxExemptionReasonCode>";
                // line 339
                echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
                echo "</cbc:TaxExemptionReasonCode>
                    ";
                // line 340
                $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
                // line 341
                echo "                    <cac:TaxScheme>
                        <cbc:ID>";
                // line 342
                echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "id", []);
                echo "</cbc:ID>
                        <cbc:Name>";
                // line 343
                echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "name", []);
                echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
                // line 344
                echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "code", []);
                echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        ";
            }
            // line 350
            echo "        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 351
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            <cac:SellersItemIdentification>
                <cbc:ID>";
            // line 353
            echo $this->getAttribute($context["detail"], "codProducto", []);
            echo "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
            // line 355
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 356
                echo "            <cac:CommodityClassification>
                <cbc:ItemClassificationCode listID=\"UNSPSC\" listAgencyName=\"GS1 US\" listName=\"Item Classification\">";
                // line 357
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
            }
            // line 360
            echo "        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 362
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorUnitario", [])]);
            echo "</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 366
        echo "</Invoice>
";
        $___internal_334d8736cf24098247a67473a5b6b65d23d9ba0baeaf1ef267df8450af5a529a_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_334d8736cf24098247a67473a5b6b65d23d9ba0baeaf1ef267df8450af5a529a_);
    }

    public function getTemplateName()
    {
        return "invoice2.0.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  968 => 1,  964 => 366,  944 => 362,  940 => 360,  934 => 357,  931 => 356,  929 => 355,  924 => 353,  919 => 351,  916 => 350,  907 => 344,  903 => 343,  899 => 342,  896 => 341,  894 => 340,  890 => 339,  883 => 337,  876 => 335,  873 => 334,  870 => 333,  867 => 332,  854 => 322,  847 => 320,  840 => 318,  837 => 317,  834 => 316,  831 => 315,  823 => 312,  818 => 309,  816 => 308,  813 => 307,  804 => 303,  801 => 302,  792 => 298,  789 => 297,  787 => 296,  780 => 294,  774 => 293,  770 => 292,  767 => 291,  750 => 290,  742 => 288,  734 => 287,  728 => 286,  722 => 285,  719 => 284,  703 => 273,  696 => 271,  693 => 270,  690 => 269,  688 => 268,  673 => 258,  666 => 256,  663 => 255,  660 => 254,  644 => 243,  637 => 241,  634 => 240,  631 => 239,  628 => 238,  625 => 237,  616 => 234,  610 => 233,  604 => 232,  601 => 231,  596 => 230,  593 => 229,  587 => 226,  583 => 224,  580 => 223,  575 => 220,  571 => 218,  565 => 216,  562 => 215,  556 => 213,  554 => 212,  551 => 211,  549 => 210,  544 => 208,  541 => 207,  534 => 203,  528 => 201,  522 => 199,  520 => 198,  517 => 197,  514 => 196,  512 => 195,  507 => 193,  503 => 192,  500 => 191,  497 => 190,  495 => 189,  491 => 187,  487 => 185,  481 => 183,  478 => 182,  472 => 180,  470 => 179,  467 => 178,  465 => 177,  460 => 175,  457 => 174,  450 => 170,  444 => 168,  438 => 166,  436 => 165,  433 => 164,  430 => 163,  428 => 162,  423 => 160,  419 => 159,  416 => 158,  414 => 157,  410 => 155,  406 => 153,  400 => 151,  397 => 150,  391 => 148,  389 => 147,  386 => 146,  384 => 145,  379 => 143,  372 => 139,  367 => 137,  363 => 136,  359 => 135,  355 => 134,  351 => 133,  348 => 132,  346 => 131,  341 => 129,  334 => 125,  321 => 115,  315 => 112,  309 => 109,  306 => 108,  303 => 107,  300 => 106,  291 => 103,  287 => 102,  284 => 101,  279 => 100,  276 => 99,  273 => 98,  264 => 95,  260 => 94,  257 => 93,  252 => 92,  249 => 91,  243 => 88,  240 => 87,  238 => 86,  234 => 85,  230 => 84,  226 => 83,  222 => 82,  216 => 81,  205 => 72,  199 => 69,  196 => 68,  193 => 67,  190 => 66,  187 => 65,  184 => 64,  175 => 61,  171 => 60,  168 => 59,  163 => 58,  153 => 51,  149 => 50,  145 => 49,  141 => 48,  138 => 47,  135 => 46,  132 => 45,  126 => 42,  121 => 41,  115 => 39,  113 => 38,  109 => 36,  106 => 35,  103 => 34,  95 => 31,  91 => 29,  89 => 28,  82 => 26,  73 => 22,  69 => 20,  61 => 17,  57 => 15,  54 => 14,  46 => 11,  42 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "invoice2.0.xml.twig", "/opt/lampp/htdocs/laravel/vendor/greenter/xml/src/Xml/Templates/invoice2.0.xml.twig");
    }
}
