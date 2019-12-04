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

/* invoice2.1.xml.twig */
class __TwigTemplate_36215beba29167aaa103f7e3d836347eda509efce1d91f31742741fec4cf8a29 extends \Twig\Template
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
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    ";
        // line 9
        $context["emp"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "company", []);
        // line 10
        echo "    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 12
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "serie", []);
        echo "-";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "correlativo", []);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 13
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 14
        echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
    ";
        // line 15
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecVencimiento", [])) {
            // line 16
            echo "    <cbc:DueDate>";
            echo twig_date_format_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "fecVencimiento", []), "Y-m-d");
            echo "</cbc:DueDate>
    ";
        }
        // line 18
        echo "    <cbc:InvoiceTypeCode listID=\"";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoOperacion", []);
        echo "\">";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoDoc", []);
        echo "</cbc:InvoiceTypeCode>
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 20
            echo "    <cbc:Note languageLocaleID=\"";
            echo $this->getAttribute($context["leg"], "code", []);
            echo "\"><![CDATA[";
            echo $this->getAttribute($context["leg"], "value", []);
            echo "]]></cbc:Note>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", [])) {
            // line 23
            echo "    <cbc:Note><![CDATA[";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "observacion", []);
            echo "]]></cbc:Note>
    ";
        }
        // line 25
        echo "    <cbc:DocumentCurrencyCode>";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "</cbc:DocumentCurrencyCode>
    ";
        // line 26
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", [])) {
            // line 27
            echo "    <cac:OrderReference>
        <cbc:ID>";
            // line 28
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "compra", []);
            echo "</cbc:ID>
    </cac:OrderReference>
    ";
        }
        // line 31
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", [])) {
            // line 32
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 33
                echo "    <cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 34
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 35
                echo $this->getAttribute($context["guia"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "    ";
        }
        // line 39
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", [])) {
            // line 40
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "relDocs", []));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 41
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 42
                echo $this->getAttribute($context["rel"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 43
                echo $this->getAttribute($context["rel"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "    ";
        }
        // line 47
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", [])) {
            // line 48
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 49
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 50
                echo $this->getAttribute($context["ant"], "nroDocRel", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 51
                echo $this->getAttribute($context["ant"], "tipoDocRel", []);
                echo "</cbc:DocumentTypeCode>
        <cbc:DocumentStatusCode>";
                // line 52
                echo $this->getAttribute($context["loop"], "index", []);
                echo "</cbc:DocumentStatusCode>
        <cac:IssuerParty>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
                // line 55
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
                echo "</cbc:ID>
            </cac:PartyIdentification>
        </cac:IssuerParty>
    </cac:AdditionalDocumentReference>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "    ";
        }
        // line 61
        echo "    <cac:Signature>
        <cbc:ID>";
        // line 62
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 65
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 68
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
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
        // line 80
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 83
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 86
        echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 87
        $context["addr"] = $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "address", []);
        // line 88
        echo "                <cac:RegistrationAddress>
                    <cbc:ID>";
        // line 89
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
        echo "</cbc:ID>
                    <cbc:AddressTypeCode>";
        // line 90
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codLocal", []);
        echo "</cbc:AddressTypeCode>
                    ";
        // line 91
        if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", [])) {
            // line 92
            echo "                    <cbc:CitySubdivisionName>";
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", []);
            echo "</cbc:CitySubdivisionName>
                    ";
        }
        // line 94
        echo "                    <cbc:CityName>";
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "provincia", []);
        echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
        // line 95
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "departamento", []);
        echo "</cbc:CountrySubentity>
                    <cbc:District>";
        // line 96
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "distrito", []);
        echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
        // line 98
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
        echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
        // line 101
        echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
        // line 105
        if (($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []) || $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []))) {
            // line 106
            echo "            <cac:Contact>
                ";
            // line 107
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", [])) {
                // line 108
                echo "                <cbc:Telephone>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 110
            echo "                ";
            if ($this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", [])) {
                // line 111
                echo "                <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["emp"]) ? $context["emp"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 113
            echo "            </cac:Contact>
            ";
        }
        // line 115
        echo "        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 117
        $context["client"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "client", []);
        // line 118
        echo "    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
        // line 121
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "numDoc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 124
        echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 125
        if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", [])) {
            // line 126
            echo "                ";
            $context["addr"] = $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "address", []);
            // line 127
            echo "                <cac:RegistrationAddress>
                    ";
            // line 128
            if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", [])) {
                // line 129
                echo "                    <cbc:ID>";
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
                echo "</cbc:ID>
                    ";
            }
            // line 131
            echo "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 132
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
            echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
            // line 135
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
        }
        // line 139
        echo "            </cac:PartyLegalEntity>
            ";
        // line 140
        if (($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []) || $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []))) {
            // line 141
            echo "            <cac:Contact>
                ";
            // line 142
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", [])) {
                // line 143
                echo "                <cbc:Telephone>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 145
            echo "                ";
            if ($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", [])) {
                // line 146
                echo "                <cbc:ElectronicMail>";
                echo $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 148
            echo "            </cac:Contact>
            ";
        }
        // line 150
        echo "        </cac:Party>
    </cac:AccountingCustomerParty>
    ";
        // line 152
        $context["seller"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "seller", []);
        // line 153
        echo "    ";
        if ((isset($context["seller"]) ? $context["seller"] : null)) {
            // line 154
            echo "    <cac:SellerSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
            // line 157
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "tipoDoc", []);
            echo "\">";
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "numDoc", []);
            echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 160
            echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "rznSocial", []);
            echo "]]></cbc:RegistrationName>
                ";
            // line 161
            if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "address", [])) {
                // line 162
                echo "                ";
                $context["addr"] = $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "address", []);
                // line 163
                echo "                <cac:RegistrationAddress>
                    ";
                // line 164
                if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", [])) {
                    // line 165
                    echo "                    <cbc:ID>";
                    echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
                    echo "</cbc:ID>
                    ";
                }
                // line 167
                echo "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
                // line 168
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
                echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
                // line 171
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
                echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
            }
            // line 175
            echo "            </cac:PartyLegalEntity>
            ";
            // line 176
            if (($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", []) || $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", []))) {
                // line 177
                echo "            <cac:Contact>
                ";
                // line 178
                if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", [])) {
                    // line 179
                    echo "                <cbc:Telephone>";
                    echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "telephone", []);
                    echo "</cbc:Telephone>
                ";
                }
                // line 181
                echo "                ";
                if ($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", [])) {
                    // line 182
                    echo "                <cbc:ElectronicMail>";
                    echo $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "email", []);
                    echo "</cbc:ElectronicMail>
                ";
                }
                // line 184
                echo "            </cac:Contact>
            ";
            }
            // line 186
            echo "        </cac:Party>
    </cac:SellerSupplierParty>
    ";
        }
        // line 189
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "direccionEntrega", [])) {
            // line 190
            echo "        ";
            $context["addr"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "direccionEntrega", []);
            // line 191
            echo "        <cac:Delivery>
            <cac:DeliveryLocation>
                <cac:Address>
                    <cbc:ID>";
            // line 194
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "ubigueo", []);
            echo "</cbc:ID>
                    ";
            // line 195
            if ($this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", [])) {
                // line 196
                echo "                    <cbc:CitySubdivisionName>";
                echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "urbanizacion", []);
                echo "</cbc:CitySubdivisionName>
                    ";
            }
            // line 198
            echo "                    <cbc:CityName>";
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "provincia", []);
            echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
            // line 199
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "departamento", []);
            echo "</cbc:CountrySubentity>
                    <cbc:District>";
            // line 200
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "distrito", []);
            echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 202
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "direccion", []);
            echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode listID=\"ISO 3166-1\" listAgencyName=\"United Nations Economic Commission for Europe\" listName=\"Country\">";
            // line 205
            echo $this->getAttribute((isset($context["addr"]) ? $context["addr"] : null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:Address>
            </cac:DeliveryLocation>
        </cac:Delivery>
    ";
        }
        // line 211
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "detraccion", [])) {
            // line 212
            echo "    ";
            $context["detr"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "detraccion", []);
            // line 213
            echo "    <cac:PaymentMeans>
        <cbc:PaymentMeansCode>";
            // line 214
            echo $this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "codMedioPago", []);
            echo "</cbc:PaymentMeansCode>
        <cac:PayeeFinancialAccount>
            <cbc:ID>";
            // line 216
            echo $this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "ctaBanco", []);
            echo "</cbc:ID>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:PaymentMeansID>";
            // line 220
            echo $this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "codBienDetraccion", []);
            echo "</cbc:PaymentMeansID>
        <cbc:PaymentPercent>";
            // line 221
            echo $this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "percent", []);
            echo "</cbc:PaymentPercent>
        <cbc:Amount currencyID=\"PEN\">";
            // line 222
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["detr"]) ? $context["detr"] : null), "mount", [])]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 225
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", [])) {
            // line 226
            echo "    <cac:PaymentTerms>
        <cbc:ID>Percepcion</cbc:ID>
        <cbc:Amount currencyID=\"PEN\">";
            // line 228
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", []), "mtoTotal", [])]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 231
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", [])) {
            // line 232
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "anticipos", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 233
                echo "    <cac:PrepaidPayment>
        <cbc:ID>";
                // line 234
                echo $this->getAttribute($context["loop"], "index", []);
                echo "</cbc:ID>
        <cbc:PaidAmount currencyID=\"";
                // line 235
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["ant"], "total", [])]);
                echo "</cbc:PaidAmount>
    </cac:PrepaidPayment>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 238
            echo "    ";
        }
        // line 239
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "cargos", [])) {
            // line 240
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "cargos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                // line 241
                echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 243
                echo $this->getAttribute($context["cargo"], "codTipo", []);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 244
                echo $this->getAttribute($context["cargo"], "factor", []);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 245
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["cargo"], "monto", [])]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 246
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["cargo"], "montoBase", [])]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 249
            echo "    ";
        }
        // line 250
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "descuentos", [])) {
            // line 251
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "descuentos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                // line 252
                echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 254
                echo $this->getAttribute($context["desc"], "codTipo", []);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 255
                echo $this->getAttribute($context["desc"], "factor", []);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 256
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["desc"], "monto", [])]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 257
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["desc"], "montoBase", [])]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            echo "    ";
        }
        // line 261
        echo "    ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", [])) {
            // line 262
            echo "    ";
            $context["perc"] = $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "perception", []);
            // line 263
            echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
            // line 265
            echo $this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "codReg", []);
            echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
            // line 266
            echo $this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "porcentaje", []);
            echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"PEN\">";
            // line 267
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mto", [])]);
            echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"PEN\">";
            // line 268
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["perc"]) ? $context["perc"] : null), "mtoBase", [])]);
            echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
        }
        // line 271
        echo "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 272
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalImpuestos", [])]);
        echo "</cbc:TaxAmount>
        ";
        // line 273
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])) {
            // line 274
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 275
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseIsc", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 276
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoISC", [])]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>2000</cbc:ID>
                    <cbc:Name>ISC</cbc:Name>
                    <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 286
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])) {
            // line 287
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 288
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGravadas", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 289
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", [])]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 299
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperInafectas", [])) {
            // line 300
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 301
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperInafectas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 302
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 312
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExoneradas", [])) {
            // line 313
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 314
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExoneradas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 315
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 325
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])) {
            // line 326
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 327
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperGratuitas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 328
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIGV", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 338
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExportacion", [])) {
            // line 339
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 340
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOperExportacion", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 341
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 351
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIvap", [])) {
            // line 352
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 353
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseIvap", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 354
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoIvap", [])]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1016</cbc:ID>
                    <cbc:Name>IVAP</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 364
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", [])) {
            // line 365
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 366
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoBaseOth", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 367
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoOtrosTributos", [])]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>9999</cbc:ID>
                    <cbc:Name>OTROS</cbc:Name>
                    <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 377
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "icbper", [])) {
            // line 378
            echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
            // line 379
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "icbper", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 389
        echo "    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID=\"";
        // line 391
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "valorVenta", [])]);
        echo "</cbc:LineExtensionAmount>
        ";
        // line 392
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoDescuentos", [])) {
            // line 393
            echo "        <cbc:AllowanceTotalAmount currencyID=\"";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoDescuentos", [])]);
            echo "</cbc:AllowanceTotalAmount>
        ";
        }
        // line 395
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])) {
            // line 396
            echo "        <cbc:ChargeTotalAmount currencyID=\"";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "sumOtrosCargos", [])]);
            echo "</cbc:ChargeTotalAmount>
        ";
        }
        // line 398
        echo "        ";
        if ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalAnticipos", [])) {
            // line 399
            echo "        <cbc:PrepaidAmount currencyID=\"";
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "totalAnticipos", [])]);
            echo "</cbc:PrepaidAmount>
        ";
        }
        // line 401
        echo "        <cbc:PayableAmount currencyID=\"";
        echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "mtoImpVenta", [])]);
        echo "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
        // line 403
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
            // line 404
            echo "    <cac:InvoiceLine>
        <cbc:ID>";
            // line 405
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"";
            // line 406
            echo $this->getAttribute($context["detail"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["detail"], "cantidad", []);
            echo "</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 407
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorVenta", [])]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 409
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 410
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 411
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", []), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 415
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 416
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", []), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 420
            echo "        </cac:PricingReference>
        ";
            // line 421
            if ($this->getAttribute($context["detail"], "cargos", [])) {
                // line 422
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "cargos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                    // line 423
                    echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 425
                    echo $this->getAttribute($context["cargo"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 426
                    echo $this->getAttribute($context["cargo"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 427
                    echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["cargo"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 428
                    echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["cargo"], "montoBase", []);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 431
                echo "        ";
            }
            // line 432
            echo "        ";
            if ($this->getAttribute($context["detail"], "descuentos", [])) {
                // line 433
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "descuentos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                    // line 434
                    echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 436
                    echo $this->getAttribute($context["desc"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 437
                    echo $this->getAttribute($context["desc"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 438
                    echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["desc"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 439
                    echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["desc"], "montoBase", []);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 442
                echo "        ";
            }
            // line 443
            echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 444
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "totalImpuestos", [])]);
            echo "</cbc:TaxAmount>
            ";
            // line 445
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 446
                echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 447
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIsc", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 448
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 450
                echo $this->getAttribute($context["detail"], "porcentajeIsc", []);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 451
                echo $this->getAttribute($context["detail"], "tipSisIsc", []);
                echo "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 460
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 461
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIgv", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 462
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 464
            echo $this->getAttribute($context["detail"], "porcentajeIgv", []);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 465
            echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 466
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
            // line 467
            echo "                    <cac:TaxScheme>
                        <cbc:ID>";
            // line 468
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "id", []);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 469
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "name", []);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 470
            echo $this->getAttribute((isset($context["afect"]) ? $context["afect"] : null), "code", []);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 474
            if ($this->getAttribute($context["detail"], "otroTributo", [])) {
                // line 475
                echo "                <cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"";
                // line 476
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseOth", [])]);
                echo "</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"";
                // line 477
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "otroTributo", [])]);
                echo "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>";
                // line 479
                echo $this->getAttribute($context["detail"], "porcentajeOth", []);
                echo "</cbc:Percent>
                        <cac:TaxScheme>
                            <cbc:ID>9999</cbc:ID>
                            <cbc:Name>OTROS</cbc:Name>
                            <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            ";
            }
            // line 488
            echo "            ";
            if ($this->getAttribute($context["detail"], "icbper", [])) {
                // line 489
                echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 490
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "icbper", [])]);
                echo "</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode=\"";
                // line 491
                echo $this->getAttribute($context["detail"], "unidad", []);
                echo "\">";
                echo $this->getAttribute($context["detail"], "cantidad", []);
                echo "</cbc:BaseUnitMeasure>
                <cbc:PerUnitAmount currencyID=\"";
                // line 492
                echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "factorIcbper", [])]);
                echo "</cbc:PerUnitAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 502
            echo "        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 504
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            ";
            // line 505
            if ($this->getAttribute($context["detail"], "codProducto", [])) {
                // line 506
                echo "            <cac:SellersItemIdentification>
                <cbc:ID>";
                // line 507
                echo $this->getAttribute($context["detail"], "codProducto", []);
                echo "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
            }
            // line 510
            echo "            ";
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 511
                echo "            <cac:CommodityClassification>
                <cbc:ItemClassificationCode>";
                // line 512
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
            }
            // line 515
            echo "            ";
            if ($this->getAttribute($context["detail"], "codProdGS1", [])) {
                // line 516
                echo "            <cac:StandardItemIdentification>
                <cbc:ID>";
                // line 517
                echo $this->getAttribute($context["detail"], "codProdGS1", []);
                echo "</cbc:ID>
            </cac:StandardItemIdentification>
            ";
            }
            // line 520
            echo "            ";
            if ($this->getAttribute($context["detail"], "atributos", [])) {
                // line 521
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "atributos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 522
                    echo "                    <cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 523
                    echo $this->getAttribute($context["atr"], "name", []);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 524
                    echo $this->getAttribute($context["atr"], "code", []);
                    echo "</cbc:NameCode>
                        ";
                    // line 525
                    if ($this->getAttribute($context["atr"], "value", [])) {
                        // line 526
                        echo "                        <cbc:Value>";
                        echo $this->getAttribute($context["atr"], "value", []);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 528
                    echo "                        ";
                    if ((($this->getAttribute($context["atr"], "fecInicio", []) || $this->getAttribute($context["atr"], "fecFin", [])) || $this->getAttribute($context["atr"], "duracion", []))) {
                        // line 529
                        echo "                            <cac:UsabilityPeriod>
                                ";
                        // line 530
                        if ($this->getAttribute($context["atr"], "fecInicio", [])) {
                            // line 531
                            echo "                                <cbc:StartDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecInicio", []), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 533
                        echo "                                ";
                        if ($this->getAttribute($context["atr"], "fecFin", [])) {
                            // line 534
                            echo "                                <cbc:EndDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecFin", []), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 536
                        echo "                                ";
                        if ($this->getAttribute($context["atr"], "duracion", [])) {
                            // line 537
                            echo "                                <cbc:DurationMeasure unitCode=\"DAY\">";
                            echo $this->getAttribute($context["atr"], "duracion", []);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 539
                        echo "                            </cac:UsabilityPeriod>
                        ";
                    }
                    // line 541
                    echo "                    </cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 543
                echo "            ";
            }
            // line 544
            echo "        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 546
            echo $this->getAttribute((isset($context["doc"]) ? $context["doc"] : null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorUnitario", []), 10]);
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
        // line 550
        echo "</Invoice>
";
        $___internal_db0ec98829022c46536e80105d05f1a62a6669605b4f85c9143a0826ead72b98_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_db0ec98829022c46536e80105d05f1a62a6669605b4f85c9143a0826ead72b98_);
    }

    public function getTemplateName()
    {
        return "invoice2.1.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1512 => 1,  1508 => 550,  1488 => 546,  1484 => 544,  1481 => 543,  1474 => 541,  1470 => 539,  1464 => 537,  1461 => 536,  1455 => 534,  1452 => 533,  1446 => 531,  1444 => 530,  1441 => 529,  1438 => 528,  1432 => 526,  1430 => 525,  1426 => 524,  1422 => 523,  1419 => 522,  1414 => 521,  1411 => 520,  1405 => 517,  1402 => 516,  1399 => 515,  1393 => 512,  1390 => 511,  1387 => 510,  1381 => 507,  1378 => 506,  1376 => 505,  1372 => 504,  1368 => 502,  1353 => 492,  1347 => 491,  1341 => 490,  1338 => 489,  1335 => 488,  1323 => 479,  1316 => 477,  1310 => 476,  1307 => 475,  1305 => 474,  1298 => 470,  1294 => 469,  1290 => 468,  1287 => 467,  1285 => 466,  1281 => 465,  1277 => 464,  1270 => 462,  1264 => 461,  1261 => 460,  1249 => 451,  1245 => 450,  1238 => 448,  1232 => 447,  1229 => 446,  1227 => 445,  1221 => 444,  1218 => 443,  1215 => 442,  1204 => 439,  1198 => 438,  1194 => 437,  1190 => 436,  1186 => 434,  1181 => 433,  1178 => 432,  1175 => 431,  1164 => 428,  1158 => 427,  1154 => 426,  1150 => 425,  1146 => 423,  1141 => 422,  1139 => 421,  1136 => 420,  1127 => 416,  1124 => 415,  1115 => 411,  1112 => 410,  1110 => 409,  1103 => 407,  1097 => 406,  1093 => 405,  1090 => 404,  1073 => 403,  1065 => 401,  1057 => 399,  1054 => 398,  1046 => 396,  1043 => 395,  1035 => 393,  1033 => 392,  1027 => 391,  1023 => 389,  1008 => 379,  1005 => 378,  1002 => 377,  987 => 367,  981 => 366,  978 => 365,  975 => 364,  960 => 354,  954 => 353,  951 => 352,  948 => 351,  935 => 341,  929 => 340,  926 => 339,  923 => 338,  908 => 328,  902 => 327,  899 => 326,  896 => 325,  883 => 315,  877 => 314,  874 => 313,  871 => 312,  858 => 302,  852 => 301,  849 => 300,  846 => 299,  831 => 289,  825 => 288,  822 => 287,  819 => 286,  804 => 276,  798 => 275,  795 => 274,  793 => 273,  787 => 272,  784 => 271,  778 => 268,  774 => 267,  770 => 266,  766 => 265,  762 => 263,  759 => 262,  756 => 261,  753 => 260,  742 => 257,  736 => 256,  732 => 255,  728 => 254,  724 => 252,  719 => 251,  716 => 250,  713 => 249,  702 => 246,  696 => 245,  692 => 244,  688 => 243,  684 => 241,  679 => 240,  676 => 239,  673 => 238,  654 => 235,  650 => 234,  647 => 233,  629 => 232,  626 => 231,  620 => 228,  616 => 226,  613 => 225,  607 => 222,  603 => 221,  599 => 220,  592 => 216,  587 => 214,  584 => 213,  581 => 212,  578 => 211,  569 => 205,  563 => 202,  558 => 200,  554 => 199,  549 => 198,  543 => 196,  541 => 195,  537 => 194,  532 => 191,  529 => 190,  526 => 189,  521 => 186,  517 => 184,  511 => 182,  508 => 181,  502 => 179,  500 => 178,  497 => 177,  495 => 176,  492 => 175,  485 => 171,  479 => 168,  476 => 167,  470 => 165,  468 => 164,  465 => 163,  462 => 162,  460 => 161,  456 => 160,  448 => 157,  443 => 154,  440 => 153,  438 => 152,  434 => 150,  430 => 148,  424 => 146,  421 => 145,  415 => 143,  413 => 142,  410 => 141,  408 => 140,  405 => 139,  398 => 135,  392 => 132,  389 => 131,  383 => 129,  381 => 128,  378 => 127,  375 => 126,  373 => 125,  369 => 124,  361 => 121,  356 => 118,  354 => 117,  350 => 115,  346 => 113,  340 => 111,  337 => 110,  331 => 108,  329 => 107,  326 => 106,  324 => 105,  317 => 101,  311 => 98,  306 => 96,  302 => 95,  297 => 94,  291 => 92,  289 => 91,  285 => 90,  281 => 89,  278 => 88,  276 => 87,  272 => 86,  266 => 83,  260 => 80,  245 => 68,  239 => 65,  233 => 62,  230 => 61,  227 => 60,  208 => 55,  202 => 52,  198 => 51,  194 => 50,  191 => 49,  173 => 48,  170 => 47,  167 => 46,  158 => 43,  154 => 42,  151 => 41,  146 => 40,  143 => 39,  140 => 38,  131 => 35,  127 => 34,  124 => 33,  119 => 32,  116 => 31,  110 => 28,  107 => 27,  105 => 26,  100 => 25,  94 => 23,  91 => 22,  80 => 20,  76 => 19,  69 => 18,  63 => 16,  61 => 15,  57 => 14,  53 => 13,  47 => 12,  43 => 10,  41 => 9,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "invoice2.1.xml.twig", "/opt/lampp/htdocs/clientes/comercial_penia/greenter/vendor/greenter/xml/src/Xml/Templates/invoice2.1.xml.twig");
    }
}
