<?php

use Illuminate\Database\Seeder;

class PatrimonialSubTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_sub_types =
        [
            [
                'code'        => '0001',
                'description' => 'PATRIMONIO LIQUIDO'
            ],
            [
                'code'        => '0002',
                'description' => 'TERRENOS'
            ],
            [
                'code'        => '0003',
                'description' => 'ESTACAO DE TRATAMENTO'
            ],
            [
                'code'        => '0004',
                'description' => 'PAVILHAO DOS PRODUTORES'
            ],
            [
                'code'        => '0005',
                'description' => 'PAVILHAO DOS COMERCIANTES'
            ],
            [
                'code'        => '0006',
                'description' => 'PREDIO METROL ALMOX OFIC'
            ],
            [
                'code'        => '0007',
                'description' => 'PREDIO DO RESTAURANTE'
            ],
            [
                'code'        => '0008',
                'description' => 'CENTRAL GAZ SUBST TRANS'
            ],
            [
                'code'        => '0009',
                'description' => 'PREDIO BANCOS E LOJAS'
            ],
            [
                'code'        => '0010',
                'description' => 'PREDIO ADMINISTRACAO'
            ],
            [
                'code'        => '0011',
                'description' => 'PREDIO TELEF TORRE ARRE'
            ],
            [
                'code'        => '0012',
                'description' => 'PREDIO ALTA TENSAO'
            ],
            [
                'code'        => '0013',
                'description' => 'PREDIO PORTARIA'
            ],
            [
                'code'        => '0014',
                'description' => 'PORTICO'
            ],
            [
                'code'        => '0015',
                'description' => 'POSTO SERVICOS'
            ],
            [
                'code'        => '0016',
                'description' => 'GALPAO CRIOULO'
            ],
            [
                'code'        => '0017',
                'description' => 'RESERVATORIO SEMI ENTER'
            ],
            [
                'code'        => '0018',
                'description' => 'RESERVATORIO ELEVADO'
            ],
            [
                'code'        => '0019',
                'description' => 'GARAGEM'
            ],
            [
                'code'        => '0020',
                'description' => 'PAVILHAO 04'
            ],
            [
                'code'        => '0021',
                'description' => 'PAISAGISMO'
            ],
            [
                'code'        => '0022',
                'description' => 'PAVIMENTACOES'
            ],
            [
                'code'        => '0023',
                'description' => 'ACESSO'
            ],
            [
                'code'        => '0024',
                'description' => 'TERRAPLANAGEM'
            ],
            [
                'code'        => '0025',
                'description' => 'CENTRO UTILIDADE PUBLICA'
            ],
            [
                'code'        => '0026',
                'description' => 'REDE GERAL ESGOTO PLUVIAL'
            ],
            [
                'code'        => '0027',
                'description' => 'REDE GERAL ESGOTO CLOACAL'
            ],
            [
                'code'        => '0028',
                'description' => 'REDE GERAL AGUA'
            ],
            [
                'code'        => '0029',
                'description' => 'REDE GERAL ALTA TENSAO'
            ],
            [
                'code'        => '0030',
                'description' => 'REDE GERAL ILUMINACAO EXT'
            ],
            [
                'code'        => '0031',
                'description' => 'SISTEMA COMUNICACOES'
            ],
            [
                'code'        => '0032',
                'description' => 'CANAL'
            ],
            [
                'code'        => '0034',
                'description' => 'MURO DE PROTECAO'
            ],
            [
                'code'        => '0036',
                'description' => 'PAVILHAO DE LOJAS'
            ],
            [
                'code'        => '0037',
                'description' => 'PREDIO DOS VEST REFEIT'
            ],
            [
                'code'        => '0038',
                'description' => 'REDE GERAL DE AGUA'
            ],
            [
                'code'        => '0039',
                'description' => 'AUTOMOVEIS'
            ],
            [
                'code'        => '0040',
                'description' => 'CAMIONETAS'
            ],
            [
                'code'        => '0041',
                'description' => 'TRATORES'
            ],
            [
                'code'        => '0042',
                'description' => 'BICICLETAS'
            ],
            [
                'code'        => '0043',
                'description' => 'ONIBUS PAP'
            ],
            [
                'code'        => '0045',
                'description' => 'EXAUSTORES'
            ],
            [
                'code'        => '0046',
                'description' => 'CENTRIFUGADORES ESPREME'
            ],
            [
                'code'        => '0047',
                'description' => 'EQUIPAMENTOS COZINHA'
            ],
            [
                'code'        => '0048',
                'description' => 'FOGOES'
            ],
            [
                'code'        => '0049',
                'description' => 'LAVADORAS'
            ],
            [
                'code'        => '0050',
                'description' => 'MOTORES'
            ],
            [
                'code'        => '0051',
                'description' => 'COMPRESSORES DE AR'
            ],
            [
                'code'        => '0052',
                'description' => 'TRANSFORMADOR CORRENTE'
            ],
            [
                'code'        => '0053',
                'description' => 'BOMBAS RECALQUE'
            ],
            [
                'code'        => '0054',
                'description' => 'ESMERIL ELETRICO'
            ],
            [
                'code'        => '0055',
                'description' => 'APARELHO SOLDA ELETRICA'
            ],
            [
                'code'        => '0056',
                'description' => 'FERRAMENTAS'
            ],
            [
                'code'        => '0057',
                'description' => 'MEDIDORES ELETR TRIFASICO'
            ],
            [
                'code'        => '0058',
                'description' => 'BETONEIRAS'
            ],
            [
                'code'        => '0059',
                'description' => 'EQUIP MAQ BENEF CITRUS'
            ],
            [
                'code'        => '0061',
                'description' => 'CARRETAS AGRICOLAS'
            ],
            [
                'code'        => '0062',
                'description' => 'EQUIP POSTO SERVICOS'
            ],
            [
                'code'        => '0063',
                'description' => 'PERFURADORAS'
            ],
            [
                'code'        => '0064',
                'description' => 'VIBRADOR IMERSAO'
            ],
            [
                'code'        => '0066',
                'description' => 'EQUIP CENTRAL GAZ'
            ],
            [
                'code'        => '0067',
                'description' => 'EQUIP SOM E IMAGEM'
            ],
            [
                'code'        => '0068',
                'description' => 'PISTOLA DE PINTURA'
            ],
            [
                'code'        => '0069',
                'description' => 'EQUIP CONTRA INCENDIO'
            ],
            [
                'code'        => '0070',
                'description' => 'EQUIP CENTRAL TERMICO'
            ],
            [
                'code'        => '0071',
                'description' => 'EQUIP MAQ SELEC TOMATES'
            ],
            [
                'code'        => '0072',
                'description' => 'EQUIP DE LIMPEZA'
            ],
            [
                'code'        => '0073',
                'description' => 'PISTOLA P/FIXACAO'
            ],
            [
                'code'        => '0075',
                'description' => 'HIDROMETRO'
            ],
            [
                'code'        => '0076',
                'description' => 'ANDAIMES'
            ],
            [
                'code'        => '0077',
                'description' => 'EQUIP BORRACHARIA'
            ],
            [
                'code'        => '0078',
                'description' => 'MAQUINAS CORTAR GRAMA'
            ],
            [
                'code'        => '0079',
                'description' => 'ALICATE VOLT AMPERIMETRO'
            ],
            [
                'code'        => '0080',
                'description' => 'ESTABILIZADOR CORRENTE'
            ],
            [
                'code'        => '0081',
                'description' => 'EQUIP FERRAMENTAS PAT'
            ],
            [
                'code'        => '0082',
                'description' => 'TARNSFORM CORRENTE PAP'
            ],
            [
                'code'        => '0083',
                'description' => 'MAQS LAV WAP QUICK C20'
            ],
            [
                'code'        => '0086',
                'description' => 'COMPRESSOR COM PISTOLA'
            ],
            [
                'code'        => '0087',
                'description' => 'CARREGADOR BAT BIVOLTAGEM'
            ],
            [
                'code'        => '0088',
                'description' => 'MAQUINAS DE ESCREVER'
            ],
            [
                'code'        => '0089',
                'description' => 'MAQUINAS DE CALCULAR'
            ],
            [
                'code'        => '0092',
                'description' => 'MAQUINA DE ENCADERNAR'
            ],
            [
                'code'        => '0093',
                'description' => 'APARELHOS COPIA'
            ],
            [
                'code'        => '0095',
                'description' => 'CAIXA REGISTRADORA PAP'
            ],
            [
                'code'        => '0097',
                'description' => 'INFORMATICA'
            ],
            [
                'code'        => '0099',
                'description' => 'CAMARAS FRIAS'
            ],
            [
                'code'        => '0100',
                'description' => 'MESAS'
            ],
            [
                'code'        => '0101',
                'description' => 'CADEIRAS'
            ],
            [
                'code'        => '0102',
                'description' => 'ARMARIOS'
            ],
            [
                'code'        => '0103',
                'description' => 'COFRES'
            ],
            [
                'code'        => '0104',
                'description' => 'RELOGIOS DE PONTOS'
            ],
            [
                'code'        => '0105',
                'description' => 'VENTILADORES'
            ],
            [
                'code'        => '0106',
                'description' => 'BALCONETES COM COFRE'
            ],
            [
                'code'        => '0107',
                'description' => 'KARDEX'
            ],
            [
                'code'        => '0108',
                'description' => 'BANCAS SERVICOS'
            ],
            [
                'code'        => '0109',
                'description' => 'PRATELEIRAS'
            ],
            [
                'code'        => '0110',
                'description' => 'ARQUIVOS'
            ],
            [
                'code'        => '0111',
                'description' => 'SOFAS E POLTRONAS'
            ],
            [
                'code'        => '0112',
                'description' => 'TAPETES'
            ],
            [
                'code'        => '0113',
                'description' => 'ENCERADEIRAS'
            ],
            [
                'code'        => '0114',
                'description' => 'ASPIRADORES'
            ],
            [
                'code'        => '0116',
                'description' => 'CONDICIONADORES DE AR'
            ],
            [
                'code'        => '0117',
                'description' => 'AUTO TRANSFORMADORES'
            ],
            [
                'code'        => '0118',
                'description' => 'CARRINHOS DE MAO'
            ],
            [
                'code'        => '0119',
                'description' => 'GABINES E GUARITAS'
            ],
            [
                'code'        => '0120',
                'description' => 'RELOGIOS DE PAREDES'
            ],
            [
                'code'        => '0121',
                'description' => 'CARRINHOS COM CACAMBA'
            ],
            [
                'code'        => '0122',
                'description' => 'UTENSILIOS DIVERSOS'
            ],
            [
                'code'        => '0123',
                'description' => 'REFRIGERADORES/BEBEDOUROS'
            ],
            [
                'code'        => '0124',
                'description' => 'FICHARIOS'
            ],
            [
                'code'        => '0125',
                'description' => 'CARRINHOS COM TONEL'
            ],
            [
                'code'        => '0127',
                'description' => 'MOVEIS UTENSILIOS MPAP'
            ],
            [
                'code'        => '0128',
                'description' => 'AQUEC AMBIENTAL CAIXAS'
            ],
            [
                'code'        => '0129',
                'description' => 'PAINEIS DIVISORIOS'
            ],
            [
                'code'        => '0130',
                'description' => 'APARELHOS TELEFONICOS'
            ],
            [
                'code'        => '0131',
                'description' => 'TRANCEPTORES E ACESSORIOS'
            ],
            [
                'code'        => '0132',
                'description' => 'APARELHOS TELEFONICOS PAP'
            ],
            [
                'code'        => '0133',
                'description' => 'REVOLVERES ROSSI CAL 38'
            ],
            [
                'code'        => '0134',
                'description' => 'BIBLIOTECA'
            ],
            [
                'code'        => '0135',
                'description' => 'CIA RIOG TELECOMUN *CRT*'
            ],
            [
                'code'        => '0146',
                'description' => 'POCOS ARTESIANOS'
            ],
            [
                'code'        => '0147',
                'description' => 'CATRACAS'
            ],
            [
                'code'        => '0148',
                'description' => 'MOTOS'
            ],
            [
                'code'        => '1109',
                'description' => 'DEPOSITO DE LIXO'
            ],
            [
                'code'        => '1110',
                'description' => 'SETOR DE MELANCIA'
            ],
            [
                'code'        => '1112',
                'description' => 'PORTICO SUL'
            ],
            [
                'code'        => '1113',
                'description' => 'PAVILHÃO FLORES'
            ],
            [
                'code'        => '1114',
                'description' => 'PAV.A5-A6-A7 MERC C/NECES MERCADOL ESPECIAIS'
            ],
            [
                'code'        => '1115',
                'description' => 'SUBSTAÇÃO DE ENERGIA G3'
            ]

        ];
    
        foreach ($patrimonial_sub_types as $patrimonial_sub_type)
        {
            \SisConPat\PatrimonialSubType::create($patrimonial_sub_type);
        }
    }
}

