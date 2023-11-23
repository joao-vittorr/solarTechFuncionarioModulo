<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura - Nº {{ $invoice->id }}</title>
    <style>
            .invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
    </style>
</head>


<body>

        <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<img
										src="{{ $img }}"
										style="width: 100%; max-width: 50px"
									/>
								</td>

								<td>
									<b>Fatura #: {{ $invoice['id'] }}</b><br />
									Data:{{ date('d/m/Y', strtotime($invoice->created_at)) }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									<h2>{{ $invoice->user->name }}</h2><br />
									{{ $invoice->user->cpf }}<br />
                                    {{ $invoice->user->email }}<br />
								</td>
								<td>
									Rua {{ $invoice->user->logradouro }}<br />
									{{ $invoice->user->numero_casa }}<br />
                                    {{ $invoice->user->bairro }}<br />
                                    {{ $invoice->user->cidade }}/{{ $invoice->user->estado }}<br />
                                    {{ $invoice->user->cep }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Data</td>
                    <td></td>
                    <td></td>
					<td>Status Pagamento</td>
				</tr>

				<tr class="details">
					<td>Data</td>
                    <td></td>
                    <td></td>
					<td>1000</td>
				</tr>

				<tr class="heading">
					<td>Produto</td>
                    <td>Quantidade de Placas</td>
                    <td></td>
					<td>Valor</td>
				</tr>

				<tr class="item">
					<td>{{ $invoice->nomePacote }}</td>
                    <td>{{ $invoice->quantidadePlacas }}</td>
                    <td></td>
					<td>R$ {{ number_format($invoice->valorFinal, 2, ',', '.') }}</td>
				</tr>

				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
					<td><h3> Total: R$ {{ number_format($invoice->valorFinal, 2, ',', '.') }}</h3></td>
				</tr>
			</table>
		</div>

      

</body>

</html>
