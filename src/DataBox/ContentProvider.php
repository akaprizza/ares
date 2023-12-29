<?php declare(strict_types=1);

namespace h4kuna\Ares\DataBox;

use Psr\Http\Message\StreamFactoryInterface;
use stdClass;

class ContentProvider
{
    private StreamFactoryInterface $streamFactory;

    private Client $client;

    public function __construct(
		Client $client,
		StreamFactoryInterface $streamFactory
	)
	{
        $this->client = $client;
        $this->streamFactory = $streamFactory;
    }


	/**
	 * @return array<stdClass>
	 */
	public function load(string $in): array
	{
		$content = $this->xml('Ico', $in)->Osoba;
		return is_array($content) ? $content : [$content];
	}


	protected function xml(string $parameter, string $value): stdClass
	{
		$xml = <<<XML
		<GetInfoRequest xmlns="http://seznam.gov.cz/ovm/ws/v1">
			<$parameter>$value</$parameter>
		</GetInfoRequest>
		XML;

		return $this->client->request(
			$this->streamFactory->createStream($xml),
		);
	}

}
