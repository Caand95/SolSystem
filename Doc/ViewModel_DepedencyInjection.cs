class Planet
{
	public string Name { get; set; }
	public int KmDiameter { get; set; }
}

class View1Model
{
	public Planet Planet { get; }
	Public string PixelDiameter { get; set; }
	
	public View1Model(Planet planet)
	{
		Planet = planet;
		PixelDiameter = planet.Diameter / 2000; // Ignore weird example
	}
}
